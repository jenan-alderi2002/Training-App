<?php

use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthEmployeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('register_client', [AuthClientController::class,'register']);
Route::post('login_client',[AuthClientController::class,'login']);
Route::get('clients',[ClientController::class,'index']);
Route::get('clients/{clients}',[ClientController::class,'show']);

Route::post('register',[AuthEmployeeController::class,'register']);
Route::post('login',[AuthEmployeeController::class,'login']);
Route::get('employees',[EmployeeController::class,'index']);
Route::get('employees/{employees}',[EmployeeController::class,'show']);
Route::get('/employees/search/{name}', [EmployeeController::class, 'search']);

Route::get('categories',[CategoryController::class,'index']);
Route::get('/categories/search/{name}', [CategoryController::class, 'search']);

Route::get('services',[ServicesController::class,'index']);
Route::get('/services/search/{name}', [ServicesController::class, 'search']);

Route::middleware('auth')->group(function () {


});

Route::group(['middleware'=>['auth:sanctum']] , function () {
Route::post('/logout',[AuthClientController::class,'logout']);
Route::delete('/DeleteAcount',[AuthClientController::class,'DeleteAcount']);
Route::post('/logout',[AuthEmployeeController::class,'logout']);
Route::delete('/DeleteAcount',[AuthEmployeeController::class,'DeleteAcount']);
    Route::post('employees/{employee}/favorite', [FavoriteController::class, 'create']);
    Route::delete('employees/{employee}/unfavorite', [FavoriteController::class, 'delete']);
    Route::get('/favorites', [FavoriteController::class, 'show'])->name('favorites.show');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/employee/experience', [ExperienceController::class, 'create']);
    Route::post('/reservation', [ReservationController::class, 'create']);
});


