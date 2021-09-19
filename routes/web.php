<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CountryComponent;
use App\Http\Livewire\GalleryComponent;
use App\Http\Livewire\RoleComponent;
use App\Http\Livewire\TravelOfferComponent;
use App\Http\Livewire\TravelPackageComponent;
use App\Http\Livewire\TravelPackageFrontComponent;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/package_travel', TravelPackageFrontComponent::class);

// Auth
Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::get('/login', [AuthController::class, "index"]);
Route::get('/register', [AuthController::class, "registerView"])->name("register");
Route::get('/logout', [AuthController::class, 'logout'])->name("logout");

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/role', RoleComponent::class);
        Route::get('/travel_package', TravelPackageComponent::class)->name('travel_package');
        Route::get('/country', CountryComponent::class)->name('country');
        Route::get('/gallery', GalleryComponent::class)->name('gallery');
        Route::get('/travel_offer', TravelOfferComponent::class)->name('travel_offer');
    });
