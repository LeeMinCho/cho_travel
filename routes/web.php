<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\CountryComponent;
use App\Http\Livewire\GalleryComponent;
use App\Http\Livewire\RoleComponent;
use App\Http\Livewire\TravelOfferComponent;
use App\Http\Livewire\TravelPackageComponent;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::get('/login', [AuthController::class, "index"]);
Route::get('/register', [AuthController::class, "register"])->name("register");
Route::get('/role', RoleComponent::class);
Route::get('/travel_package', TravelPackageComponent::class)->name('travel_package');
Route::get('/country', CountryComponent::class)->name('country');
Route::get('/gallery', GalleryComponent::class)->name('gallery');
Route::get('/travel_offer', TravelOfferComponent::class)->name('travel_offer');
