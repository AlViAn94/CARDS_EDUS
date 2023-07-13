<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewCardsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Выпуск карты

Route::get('/students', [NewCardsController::class, 'actionGetStudents']);

Route::get('/personal', [NewCardsController::class, 'actionGetPersonal']);

Route::get('/schools', [NewCardsController::class, 'actionGetSchools']);

Route::get('/region', [NewCardsController::class, 'actionRegions']);

// Менеджер
