<?php

namespace App\Http\Controllers;

use App\Actions\SendSMS;
use App\Mail\DocumentDisponible;
use App\Models\Demande;
use App\Models\DemandeStatus;
use App\Models\Document;
use App\Models\DocumentStatus;
use App\Models\Paiement;
use App\Models\TypeDemande;
use App\Models\TypeDocument;
use App\Notifications\DemandeTerminee;
use App\Notifications\DemandeValide;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DemandeController extends Controller
{
    public function liste_type_demande()
    {
        $type_demandes = TypeDemande::all();
        $page_title = 'Liste des types de demandes';
        return view('demande.liste_type', compact('type_demandes','page_title'));
    }

    public function liste_type_documents(Request $request, TypeDemande $typeDemande)
    {
        $page_title = 'Liste des types de documents';
        return view('demande.liste_document', compact('typeDemande','page_title'));
    }

    public function create(Request $request, TypeDocument $document)
    {
        $transaction_id = Str::random(16);
        return view('demande.create', compact('document','transaction_id'));
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
            //$demande->user->notify(new DemandeValide($demande));

            SendSMS::run($demande->user->contact, "Bonjour chère {$demande->user->fullName}, Votre demande de document [{$demande->type_document->intitule}]
a été validé.
Le document est à présent en cour de traiement
          ");

            //Mail::to($request->user())->send(new DocumentDisponible($demande));

        }elseif ($status == 2){
            $demande->setStatus(DemandeStatus::TERMINE);
            try{
                //$demande->user->notify(new DemandeTerminee($demande));
                SendSMS::run($demande->user->contact, "Bonjour chère {$demande->user->fullName}, Votre demande de document [{$demande->type_document->intitule}]
           est terminé.
           Vous pouvez télécharger le document ou le retrouver dans votre juridiction
          ");
                //Mail::to($request->user())->send(new DocumentDisponible($demande));
            }catch (\Exception $e){

            }

            // creer un document  pour la demande


            $document = new Document([
                'user_id'=> $demande->user_id,
                'type_document_id'=> $demande->type_document_id,
                'date_delivrance' => now(),
                'demande_id'=> $demande->id,
                'lieu_delivrance' => $request->json('hall.id'),
            ]);


            // enregistré le fichier
            if($request->hasFile('document')){
                $document->path = $request->file('document')->storePubliclyAs('documents', Str::random(10). $demande->id, 'public');
            }else{
                $document->path = "";
            }
            $document->path = 'documents_termines/documents_'.$demande->id.'.pdf';
            $document->save();

            //filtre par type de document

            if($document->type->intitule == "Casier Judiciaire"){
                $pdf = Pdf::loadView('pdf.casier', [
                    'document'=> $document,
                    'registre'=> $request->json('document.number'),
                    'juridiction'=>$request->json('hall.name'),
                    'user'=> $demande->user
                ]);
            }else{
                $pdf = Pdf::loadView('pdf.certificate', [
                    'document'=> $document,
                    'registre'=> $request->json('document.number'),
                    'juridiction'=>$request->json('hall.name'),
                    'user'=> $demande->user
                ]);
            }


            Storage::disk('s3')->put($document->path, $pdf->output());

        }
        return response()->json([
            'message'=>"ok",
            'path'=> $document->path
        ], 200);
    }

    public function download_recu(Request $request, Paiement $paiement)
    {
        $demande = $paiement->demande;
        $type_document = $paiement->demande->type_document;

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.certificate_recu',[
            'paiement'=>$paiement, 'demande'=>$demande, 'type_document'=>$type_document
        ]);
        return $pdf->download();
    }
    public function downloadi_recu()
    {

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.certest',);
        return $pdf->download();
    }
}
