<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/cars',[CarController::class,'index'])->name('car.index');

Route::get('/details/{name}',[CarController::class,'showDetails'])->name('car.details');




// part of users ------------------------------------------------------------------------------------------

Route::get('/create/account',[UserController::class,'create'])->name('user.create');

Route::post('/createuser',[UserController::class,'userStore'])->name('user.store');

//Route::put('/update/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::put('/update/Profile/{user}',[AdminController::class,'updateProfile'])->name('profile.update');

Route::get('/MyProfile',[UserController::class,'viewProfile'])->name('user.profile');

Route::get('/MyRentals',[UserController::class,'userRentals'])->name('user.rentals');



//part of LOGIN ----------------------------------------------------------------------------------------

Route::get('/login',[LoginController::class,'show'])->name('login.show');

Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');

//part of admin ----------------------------------------------------------------------------------------

// 1->admin
Route::middleware(['auth', 'user-access:1'])->group(function () {

Route::get('/admin',[AdminController::class,'index'])->name('dashboard.admin');

Route::get('/userslist',[AdminController::class,'listOfUsers'])->name('listUsers');

Route::get('/listCars',[AdminController::class,'listCarsAd'])->name('listCars');

Route::get('/rentalslist',[AdminController::class,'listRental'])->name('listRental');

Route::delete('/rental/{id}', [RentalController::class, 'destroyRental'])->name('rental.destroy');

Route::get('/edit/user/{user}',[AdminController::class,'editUser'])->name('user.edit');


Route::put('/update/user/{user}', [AdminController::class, 'updateUser'])->name('update.user.admin');

Route::delete('/user/{id}', [UserController::class, 'destroyUserByAdmin'])->name('user.destroy.user');
Route::delete('/user/{id}', [AdminController::class, 'destroyUser'])->name('user.destroy');

//car Routes

Route::get('/create/car',[CarController::class,'create'])->name('create.index');

Route::post('/create/car',[CarController::class,'store'])->name('car.store');

Route::delete('/car/{id}', [CarController::class, 'destroy'])->name('car.destroy');

Route::get('/edit/car/{car}',[CarController::class,'edit'])->name('car.edit');


Route::put('/update/car/{car}', [CarController::class, 'update'])->name('car.update');

//rentals

Route::put('/confirm/{rental}',[RentalController::class,'confirmRental'])->name('rental.confirm');
Route::put('/cancel/{rental}',[RentalController::class,'cancelRental'])->name('rental.cancel');

});

//part of Rentals ---------------------------------------------------------------------------

Route::post('/rental/store',[RentalController::class,'store'])->name('rental.store');
