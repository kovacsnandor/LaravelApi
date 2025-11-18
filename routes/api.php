<?php


use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//region users
Route::post('users/login', [UserController::class, 'login']);
Route::post('users/logout', [UserController::class, 'logout']);
Route::get('users', [UserController::class, 'index'])
    ->middleware('auth:sanctum');

Route::get('users/{id}', [UserController::class, 'show'])
    ->middleware('auth:sanctum');
Route::post('users', [UserController::class, 'store']);
       
Route::patch('users/{id}', [UserController::class, 'update'])
    ->middleware('auth:sanctum');    
Route::delete('users/{id}', [UserController::class, 'destroy'])
    ->middleware(middleware: 'auth:sanctum');    
//endregion





//endpoint
Route::get('/x', function(){
    return 'API';
});


