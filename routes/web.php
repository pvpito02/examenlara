<?php

use Illuminate\Support\Facades\Route;
use App\Models\Candidat;
use App\Http\Controllers\CandidatController;
use App\Models\Formation;
use App\Http\Controllers\FormationController;
use App\Models\CandidatFormation;
use App\Http\Controllers\CandidatFormationController;
use App\Models\Type;
use App\Http\Controllers\TypeController;
use App\Models\Reference;
use App\Http\Controllers\ReferenceController;
use App\Models\FormationReference;
use App\Http\Controllers\FormationReferenceController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('candidats',CandidatController::class);
Route::resource('formations',FormationController::class);
Route::resource('types',TypeController::class);
Route::resource('references',ReferenceController::class);
Route::get('Liste/Formation',[CandidatController::class,'form'])->name('forum');
Route::post('/form',[CandidatController::class,'Candidat_Formmation'])->name('enreg.formation');
Route::get('Graphique/tranche_age',[CandidatController::class,'pieChart'])->name('graphe');
Route::get('Statistique',[CandidatController::class,'Statistique'])->name('stat');
// Route::resource('etudiant_matieres',EtudiantMatiereController::class);
// Route::resource('etudiant_semestres',EtudiantSemestreController::class);
