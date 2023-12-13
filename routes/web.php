<?php

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
