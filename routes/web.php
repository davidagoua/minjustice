<?php

use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    \App\Http\Controllers\FrontController::class,
    'index'
]);

Route::middleware(['auth'])->group(function(){
    Route::get('/blank', function(){
        return view('base');
    });

    Route::get('/compte', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/deconnection', function () {
        Auth::logout();
        return redirect('/');
    })->name('simple-logout');

    Route::get("type-demande/", [
        \App\Http\Controllers\DemandeController::class,
        'liste_type_demande'
    ])->name('demande.type')->middleware(['isActif']);

    Route::get("type-document", [
        \App\Http\Controllers\DemandeController::class,
        'liste_type_documents'
    ])->name('demande.type_document')->middleware(['isActif']);

    Route::get("formulaire/{document}", [
        \App\Http\Controllers\DemandeController::class,
        'create'
    ])->name('demande.create')->middleware(['isActif']);

    Route::resource('profile', \App\Http\Controllers\UserController::class);

    Route::get('/documents', [
        \App\Http\Controllers\FrontController::class,
        'documents'
    ])->name('documents');

    Route::get('notification', function(){
        auth()->user()->notify(new \App\Notifications\DemandeRegistered(Demande::all()->first()));
        return back();
    })->name('notification');

    Route::any('document/{document}/dowload',[
        \App\Http\Controllers\DocumentController::class,
        'download'
    ])->name('documents.download');

    Route::any('/form/certificat-nationalite', [
        \App\Http\Controllers\DemandeController::class,
        'getCertificateForm'
    ])->name('form.certificate-of-nationality');

    Route::any('/paiement-form', [
        \App\Http\Controllers\DemandeController::class,
        'paiementForm'
    ])->name('paiementForm');

    Route::get('/demande-recu/download_recu/{paiement}', [
        \App\Http\Controllers\DemandeController::class,
        'download_recu'
    ])->name('demande.download_recu');


});

Route::get("/notitest00", function(){
   \App\Actions\SendSMS::run();
});

Route::get('/testpdf', function(){
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.test');
    return $pdf->download();
});



require __DIR__.'/auth.php';

