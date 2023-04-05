<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\ListingController;
use GuzzleHttp\Middleware;

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

//All Listings
Route::get('/', [ListingController::class, 'index'] );

Route::get('/listings/sort', [ListingController::class, 'sort'])->name('listings.sort');

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'] )->middleware('auth');

Route::get('/listings/pricing' , function (){ return view('listings.pricing'); })->name('pricing');
Route::get('/profile' , function (){ return view('profile'); })->name('profile');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

//Store Listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy')->middleware('auth');

//Show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login User 
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->name('listings.manage')->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);