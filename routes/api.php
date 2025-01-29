<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getNews', ['App\Http\Controllers\MainController', 'selectAll']);
Route::get('/getNewsInfo/{id}', ['App\Http\Controllers\MainController', 'obtainInfo']);
Route::get('/getLastOne', ['App\Http\Controllers\MainController', 'getLastOne']);
Route::post('/submitForm', ['App\Http\Controllers\MainController', 'submitForm']);
