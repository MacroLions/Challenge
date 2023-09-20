<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/card', function(){
    return view('card');
});


Route::get('/api/test', [CardController::class, 'consumirAPI']);
Route::get('/api/check_card/{pan}', [CardController::class, 'checkCard']);
Route::get('/api/check_date/{month}/{year}', [CardController::class, 'checkDate']);
Route::get('/api/check_cvv/{pan}/{cvv}', [CardController::class, 'checkCVV']);