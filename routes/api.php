<?php

use App\Http\Controllers\HomeAppliance;
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

Route::get('/home-appliances', [HomeAppliance::class, 'index']);
Route::get('/home-appliances/{id}', [HomeAppliance::class, 'show']);
Route::post('/home-appliances', [HomeAppliance::class, 'store']);
Route::put('/home-appliances/{id}', [HomeAppliance::class, 'update']);
Route::delete('/home-appliances/{id}', [HomeAppliance::class, 'destroy']);