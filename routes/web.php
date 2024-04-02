<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\Dashboard;
use App\Http\Controllers\Web\Admin\LabelController;
use App\Http\Controllers\Web\Admin\TicketController;
use App\Http\Controllers\Web\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/dashboard', Dashboard::class)->name('dashboard');

	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


	Route::prefix('tickets')->name('tickets.')->group(function () {
		Route::get('table', [TicketController::class, 'showTable'])->name('table');
	});
	Route::resource('tickets', TicketController::class);

	Route::prefix('categories')->name('categories.')->group(function () {
		Route::get('table', [CategoryController::class, 'showTable'])->name('table');
	});
	Route::resource('categories', CategoryController::class);

	Route::prefix('labels')->name('labels.')->group(function () {
		Route::get('table', [LabelController::class, 'showTable'])->name('table');
	});
	Route::resource('labels', LabelController::class);

	Route::prefix('users')->name('users.')->group(function () {
		Route::get('table', [UserController::class, 'showTable'])->name('table');
	});
	Route::resource('users', UserController::class);

});

require __DIR__ . '/auth.php';
