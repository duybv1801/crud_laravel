<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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



Route::get('/',[HomeController::class, "index"]);

Route::get('/user',[AdminController::class, "user"]);

Route::get('/deleteproduct/{id}',[AdminController::class, "deleteproduct"]);

Route::get('/product',[AdminController::class, "product"]);

Route::post('/uploadproduct',[AdminController::class, "uploadproduct"]);

Route::get('/deleteuser/{id}',[AdminController::class, "deleteuser"]);

Route::get('/redirects',[HomeController::class, "redirects"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
