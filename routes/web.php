<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'] );

//Store Listing data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Show register create form
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout']);

//Show Login Form
Route::get('/login', [UserController::class, 'login']);

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);