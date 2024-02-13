<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * **   GET ALL CATEGORY 
 */
Route::get('/get-all-category/{id?}',[ApiController::class,"allcategory"]);


 
/**
 * **GET ALL POST API
 */
Route::get('/get-all-post/{id?}',[ApiController::class, 'getallpostapi'])->name("getapi");