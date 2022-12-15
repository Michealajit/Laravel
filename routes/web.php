<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
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
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing 

//  get All data
Route::get('/', [ListingController::class,'index']);

// get single data
Route::get('/listing/{listing}',[ListingController::class,'show']);


// Show create Form  
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

// Create Single gig
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

// Show Edit Form
Route::get('/listing/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

 // Show Manage Page
 Route::get('/listings/manage',[ListingController::class,'manage']);

// Update gig
Route::put('listings/{listing}',[ListingController::class,'update'])->middleware('auth');

// Delete gig
Route::delete('listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

// Show register page 
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//Create new User
Route::post('/users',[UserController::class,'store'])->middleware('guest');

//Logout User
Route::post('/logout',[UserController::class,'logoutUser'])->middleware('auth');

// Show User Form
 Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

 // Authenticate User
 Route::post('/users/authenticate',[UserController::class,'authenticate']);

