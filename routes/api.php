<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//endpoint
Route::get('/x', function(){
    return 'API';
});


//region users
//User kezelés, login, logout

//Mindenki
Route::post('users/login', [UserController::class, 'login']);
Route::post('users/logout', [UserController::class, 'logout']);

//Rendszergazda
Route::get('users', [UserController::class, 'index'])
    ->middleware('auth:sanctum', 'ability:*');

//Mindenki: Saját profil lekérése    
Route::get('users/{id}', [UserController::class, 'show']);
//Mindenki: Regisztrálás
Route::post('users', [UserController::class, 'store']);
//Mindenki: Profil adatok módosítása      
Route::patch('users/{id}', [UserController::class, 'update']);
//Mindenki: Saját fiók megszüntetése
Route::delete('users/{id}', [UserController::class, 'destroy']);    
//endregion

//region products
//Mindenki
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);

//Admin és Raktáros
Route::post('products', [ProductController::class, 'store'])
    ->middleware('auth:sanctum', 'ability:products:create');
Route::delete('products/{id}', [ProductController::class, 'destroy'])
    ->middleware('auth:sanctum', 'ability:products:delete');
Route::patch('products/{id}', [ProductController::class, 'update'])
    ->middleware('auth:sanctum', 'ability:products:update');
//endregion    

