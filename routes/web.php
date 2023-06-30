<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PersController;
use App\Http\Controllers\AccSpeController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\VoitureController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\ExcelCSVController;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\PointPersController;
use App\Http\Controllers\UtilisateurController;

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
//Login route
Route::get('/', function() {
    return view('auth/login');
});
//QR Code
Route::get('/qrcode', function () {
    return QrCode::size(100)->generate('A basic example of QR code!');
});
//Personnelle route
Route::get('/personnel', [PersController::class, 'index'])->middleware(['auth'])->name('pers');
Route::get('/nouvpersonnel', [PersController::class, 'indexNew'])->middleware(['auth'])->name('Addpers');
Route::get('/pointpersonnel', [PointPersController::class, 'indexPoint'])->middleware(['auth'])->name('Pointpers');
Route::get('/listepersonnel', [PersController::class, 'persListe'])->middleware(['auth'])->name('Listepers');
Route::post('add', [PersController::class, 'addPers']);
Route::post('addPoint', [PointPersController::class, 'addPointPers']);
Route::get('/deletepersonnel/{persID}', [PersController::class, 'delete'])->middleware(['auth'])->name('deletepers');
Route::get('/editpersonnel/{persID}', [PersController::class, 'edit'])->middleware(['auth'])->name('editpers');
Route::put('/updatepersonnel/{persID}', [PersController::class, 'update']);
Route::get('/detailpersonnel/{persID}', [PersController::class, 'detail'])->middleware(['auth'])->name('detailpers');
Route::get('/scannQRCode', [PersController::class, 'validationQRCode'])->name('validationqrcode');
Route::get('/exportPDF', [PersController::class, 'exportPDF'])->name('exportPDF');


//accompagnateur spécialisé
Route::get('/pointAS', [AccSpeController::class, 'indexPointExt'])->middleware(['auth'])->name('PointAS');
Route::get('/listeAS', [AccSpeController::class, 'index'])->middleware(['auth'])->name('ListeAS');
Route::post('addExt', [AccSpeController::class, 'addExt']);
Route::post('addPointExt', [AccSpeController::class, 'addExtPoint']);
Route::get('/deletepersext/{extID}', [AccSpeController::class, 'deleteExt'])->middleware(['auth'])->name('deletepersext');
Route::get('/detailpersext/{persID}', [AccSpeController::class, 'detailExt'])->middleware(['auth'])->name('detailext');
Route::get('/editpersext/{persID}', [AccSpeController::class, 'editExt'])->middleware(['auth'])->name('editext');
Route::put('/updatepersext/{persID}', [AccSpeController::class, 'updateExt']);

//visiteur
//Route::get('/visiteurs', [VisiteurController::class, 'index'])->middleware(['auth'])->name('visiteur');
Route::get('/visiteur', [VisiteurController::class, 'visiteur'])->middleware(['auth'])->name('Visiteur');
Route::get('/listeVisiteur', [VisiteurController::class, 'listeVis'])->middleware(['auth'])->name('ListeVisiteur');
Route::post('addVisi', [VisiteurController::class, 'addVisi']);


//voiture
// Route::get('/voiture', [VoitureController::class, 'index'])->middleware(['auth'])->name('voiture');
// Route::get('/nouvVoiture', [VoitureController::class, 'indexNew'])->middleware(['auth'])->name('AddVoiture');
Route::get('pointVoiture', [VoitureController::class, 'mouveVoi'])->middleware(['auth'])->name('PointVoiture');
Route::get('listeVoiture', [VoitureController::class, 'listeVoi'])->middleware(['auth'])->name('ListeVoiture');

//Utilisateur
Route::get('/utilisateur', [UtilisateurController::class, 'index'])->middleware(['auth'])->name('Utilisateur');
Route::get('/deleteUser/{id}', [UtilisateurController::class, 'deleteUser'])->middleware(['auth'])->name('DeleteUser');
Route::post('activeUser/{id}', [UtilisateurController::class, 'activeUser']);
Route::post('desactiveUser/{id}', [UtilisateurController::class, 'desactiveUser']);

//Création PDF
Route::get('create-pdf-file', [PDFController::class, 'index']);

//A propos
Route::get('/a_propos', [AproposController::class, 'index'])->middleware(['auth'])->name('apropos');

//Excel
Route::get('excel-csv-file', [ExcelCSVController::class, 'index']);
Route::post('import-excel-csv-file', [ExcelCSVController::class, 'importExcelCSV']);
Route::get('export-excel-csv-file/{slug}', [ExcelCSVController::class, 'exportExcelCSV']);

//Tableau de bord
Route::get('/dashboard', [homeController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
