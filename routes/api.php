<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('rol', RolController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('client', ClientController::class);
Route::apiResource('technician', TechnicianController::class);



// Route::group(['middleware' => 'auth:sanctum'], function () {
//     Route::apiResource('products', RolController::class);
// });

// php artisan r:l para ver las rutas que tengo