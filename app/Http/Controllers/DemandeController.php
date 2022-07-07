<?php

namespace App\Http\Controllers;

use App\Actions\SendSMS;
use App\Models\Demande;
use App\Models\DemandeStatus;
use App\Models\Document;
use App\Models\DocumentStatus;
use App\Models\TypeDemande;
use App\Models\TypeDocument;
use App\Notifications\DemandeTerminee;
use App\Notifications\DemandeValide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DemandeController extends Controller
{
    public function liste_type_demande()
    {
        $type_demandes = TypeDemande::all();
        return view('demande.liste_type', compact('type_demandes'));
    }

    public function liste_type_documents(Request $request, TypeDemande $typeDemande)
    {
        return view('demande.liste_document', compact('typeDemande'));
    }

    public function create(Request $request, TypeDocument $document)
    {
        return view('demande.create', compact('document'));
    }

    public function valider(Request $request, Demande $demande)
    {
        return view('Demande en cour de traitement');
    }

    public function getCertificateForm()
    {
        return view('form.certificate_nationality',[
            'transaction_id'=> Str::random(16)
        ]);
    }

    public function paiementForm(Request $request)
    {
        return view('filaments.cinetpay', [
            'transaction_id'=> $request->input('transaction_id'),
            'amount'=> $request->input('amount')
        ]);
    }

    public function demande_callback(Request $request, Demande $demande, int $status)
    {
        if($status == 1){
            $demande->setStatus(DemandeStatus::TRAITEMENT);
            $demande->user->notify(new DemandeValide($demande));
        }elseif ($status == 2){
            $demande->setStatus(DemandeStatus::TERMINE);
            try{
                $demande->user->notify(new DemandeTerminee($demande));
            }catch (\Exception $e){

            }

            // creer un document  pour la demande

            $document = new Document([
                'user_id'=> $demande->user_id,
                'type_document_id'=> $demande->type_document_id,
                'date_delivrance' => now(),
                'demande_id'=> $demande->id,
                'lieu_delivrance' => $demande->juridition_id,
            ]);


            // enregistré le fichier
            if($request->hasFile('document')){
                $document->path = $request->file('document')->storePubliclyAs('documents', Str::random(10). $demande->id, 'public');
            }else{
                $document->path = "";
            }
            $document->save();
        }
        return response()->json("OK", 200);
    }
}
