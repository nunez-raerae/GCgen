<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GcController;
use App\Http\Controllers\GcClaimController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::resource('GCindex', GcController::class);
Route::post('GCindex/gen', [GcController::class,'gen']);
Route::get ('text', [GcController::class,'text']);

// claim
Route::resource('claim', GcClaimController::class);
