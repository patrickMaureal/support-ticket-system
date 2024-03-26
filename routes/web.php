<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Admin\Dashboard;
use App\Http\Controllers\Web\Admin\TicketController;
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
});

require __DIR__ . '/auth.php';
