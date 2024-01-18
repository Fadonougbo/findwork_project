<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/* $slug='^([\w]+-)+(\w+)$';
$id='\d+'; */

Route::prefix('/listings')->name('listings.')->controller(ListingController::class)->group(function() {

    Route::get('/','index')->name('index');
    //Route::get('/{slug}/{listing}','show')->where(['slug'=>$slug,'listing'=>$id])->name('show');
    Route::get('/{slug}/{listing}','show')->name('show');
    /**
     * show create form
     */
    Route::get('/create','create')->name('create');
    /**
     * store data
     */
    Route::post('/create','store')->name('store');

    /**
     * update 
     */
    Route::get('/update/listing/{listing}','update')->name('update');

    /**
     * save modification
     */

    Route::put('/update/listing/{listing}','save')->name('save');

    /* 
        Delete post
    */

    Route::delete('/delete/listing/{listing}','destroy')->name('destroy');
    
});

Route::prefix('/register')->name('auth')->controller(AuthController::class)->group(function() {

    //registration form
    Route::get('/user','register')->middleware('guest')->name('.register');

    //create new user
    Route::post('/user','store')->middleware('guest')->name('.store');

    //login
    Route::get('/login','login')->middleware('guest')->name('.login');

    //authentication
    Route::post('/login','authentication')->middleware('guest')->name('.authentication');

    //logout
    Route::post('/logout','logout')->middleware('auth')->name('.logout');
});

/**
 * laravel breeze route
 */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
