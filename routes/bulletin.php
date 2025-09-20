<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\NoteController;

// Routes pour les classes
Route::apiResource('classes', ClasseController::class);

// Routes pour les bulletins
Route::apiResource('bulletins', BulletinController::class);
Route::get('bulletins/{bulletin}/moyenne', [BulletinController::class, 'calculerMoyenne']);

// Routes pour les publications
Route::apiResource('publications', PublicationController::class);
Route::patch('publications/{publication}/valider', [PublicationController::class, 'valider']);

// Routes pour les notes
Route::apiResource('notes', NoteController::class);

// Routes d'authentification
Route::post('login', [AuthController::class, 'login']);
