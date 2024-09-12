<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('send-mail', [EmailController::class, 'sendWelcomeEmail']);
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('admin/products/save', [ProductController::class, 'productsave'])->name('admin/products/save');
    Route::get('admin/products/edit{id}', [ProductController::class, 'productupdate'])->name('admin/products/edit');
    Route::put('admin/products/edit{id}', [ProductController::class, 'productupdatesave'])->name('admin/products/edit');
    Route::get('admin/products/delete{id}', [ProductController::class, 'productdelete'])->name('admin/products/delete');
    Route::get('admin/products/view{id}', [ProductController::class, 'productview'])->name('admin/products/view');

    

    // Appointment routes
    Route::get('admin/appointment', [AppointmentController::class, 'index'])->name('admin/appointment');
    Route::get('admin/appointment/create', [AppointmentController::class, 'create'])->name('admin/appointment/create');
    Route::post('admin/appointment/save', [AppointmentController::class, 'appointmentsave'])->name('admin/appointment/save');
    Route::get('admin/appointment/view{id}', [AppointmentController::class, 'appointmentview'])->name('admin/appointment/view');


});
require __DIR__.'/auth.php';



//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);
