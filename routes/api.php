<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HospitalsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/auth/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logout']);

//POST
Route::post('/auth/register',[AuthController::class, 'register']);
Route::post('/auth/login',[AuthController::class, 'login']);
Route::post('/create/hospital',[HospitalsController::class, 'store']);

//GET
Route::get('users/{id?}',[UserController::class,'usersAPI']);
Route::get('/hospitals/search/{name}',[UserController::class,'search']);
Route::get('hospitalsList/{id?}',[UserController::class,'hospitals']);
// Route::get('hospitals/{id?}',[UserController::class,'searchHospitalsByNameAPI']);