<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\VotesController;

Route::get('/', function(){ return view('home'); });

Route::prefix('survey')->group(function() {
    Route::get('', [SurveysController::class, 'index']);
    Route::get('/create', [SurveysController::class, 'create']);
    Route::post('', [SurveysController::class, 'store']);
    Route::get('/{id}', [SurveysController::class, 'show']);
    Route::post('/{id}', [SurveysController::class, 'update']);
    Route::get('/{id}/edit', [SurveysController::class, 'edit']);
    Route::delete('/{id}', [SurveysController::class, 'destroy']);
});

Route::prefix('votes')->group(function() {
    Route::get('{id}', [VotesController::class, 'show']);
    Route::post('', [VotesController::class, 'vote']);
});

Route::prefix('countvotes')->group(function() {
    Route::get('{id}', [VotesController::class, 'show']);
    Route::post('{id}', [VotesController::class, 'update']);
});
