<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'doLogin'])->name('dologin');
Route::get('register', [AuthController::class, 'register_form'])->name('register');
Route::post('save_register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {

    // Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('home', [DashboardController::class, 'index'])->name('home');

    Route::get('profile', [ProfileController::class, 'index']);
    Route::post('save_profile', [ProfileController::class, 'add']);
    Route::post('update_profile', [ProfileController::class, 'update_profile']);
    Route::get('hapus/{id}', [ProfileController::class, 'delete']);



});
