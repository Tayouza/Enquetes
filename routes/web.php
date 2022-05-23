<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\VotesController;
date_default_timezone_set('America/Sao_Paulo');

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

Route::get('/', function(){ return view('home'); });
Route::get('/survey', [SurveysController::class, 'index']);
Route::post('/survey', [SurveysController::class, 'store']);
Route::get('/survey/create', [SurveysController::class, 'create']);
Route::get('/survey/{id}', [SurveysController::class, 'show']);
Route::put('/survey/{id}', [SurveysController::class, 'update']);
Route::get('/survey/{id}/edit', [SurveysController::class, 'edit']);
Route::get('/answer/{id}', [SurveysController::class, 'getAnswers']);
Route::delete('/survey/{id}', [SurveysController::class, 'destroy']);
Route::get('/countvotes/{id}', [VotesController::class, 'show']);
Route::put('/countvotes/{id}', [VotesController::class, 'update']);