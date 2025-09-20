<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdministrateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'administration des bulletins
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Gestion des bulletins
    Route::get('/bulletins', [AdministrateurController::class, 'index'])->name('bulletins.index');
    Route::get('/bulletins/{bulletin}', [AdministrateurController::class, 'show'])->name('bulletins.show');
    Route::post('/bulletins/{bulletin}/publier', [AdministrateurController::class, 'publier'])->name('bulletins.publier');
    Route::post('/bulletins/{bulletin}/valider', [AdministrateurController::class, 'valider'])->name('bulletins.valider');
    Route::post('/bulletins/{bulletin}/retirer', [AdministrateurController::class, 'retirer'])->name('bulletins.retirer');
    Route::get('/bulletins/filtrer', [AdministrateurController::class, 'filtrer'])->name('bulletins.filtrer');
    Route::get('/bulletins-statistiques', [AdministrateurController::class, 'statistiques'])->name('bulletins.statistiques');
});
Route::get('/publication',function(){
    return view('publication');
})->name('publication');
Route::get('/note',function()
{
    return view('note');
})->name('note');
Route::get('saisi',function()
{
    return view('saisi');
})->name('saisi');
Route::get('/consultation',function()
{
    return view('consultation');
})->name('consultation');

require __DIR__ . '/auth.php';
