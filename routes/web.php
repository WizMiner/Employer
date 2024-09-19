<?php

use App\Http\Controllers\JopController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JopController::class, 'index']);


Route::get('/jobs/create', [JopController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JopController::class, 'store'])->middleware('auth');


Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create']);
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');


