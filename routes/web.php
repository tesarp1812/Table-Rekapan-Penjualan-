<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\venturoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

//route controllers
Route::controller(venturoController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/2021', 'index21');
    Route::get('/2022', 'index22');
});
