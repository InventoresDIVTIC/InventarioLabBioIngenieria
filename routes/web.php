<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ServicesController;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inventory', function () {
    return view('inventory');
})->middleware(['auth', 'verified'])->name('inventory');

Route::get('/suppliers', function () {
    return view('suppliers');
})->middleware(['auth', 'verified'])->name('suppliers');

Route::get('/services', function () {
    return view('services');
})->middleware(['auth', 'verified'])->name('services');

Route::get('/tickets', function () {
    return view('tickets');
})->middleware(['auth', 'verified'])->name('tickets');

Route::get('/assets-creation', function () {
    return view('assets-creation');
})->middleware(['auth', 'verified'])->name('assets-creation');

Route::get('/suppliers-creation', function () {
    return view('suppliers-creation');
})->middleware(['auth', 'verified'])->name('suppliers-creation');

Route::get('/tickets-creation', function () {
    return view('tickets-creation');
})->middleware(['auth', 'verified'])->name('tickets-creation');

Route::get('/services-creation', function () {
    return view('services-creation');
})->middleware(['auth', 'verified'])->name('services-creation');

Route::get('/inventory-edit', function () {
    return view('inventory-edit');
})->middleware(['auth', 'verified'])->name('inventory-edit');

Route::get('/suppliers-edit', function () {
    return view('suppliers-edit');
})->middleware(['auth', 'verified'])->name('suppliers-edit');

Route::get('/tickets-edit', function () {
    return view('tickets-edit');
})->middleware(['auth', 'verified'])->name('tickets-edit');

Route::get('/services-edit', function () {
    return view('services-edit');
})->middleware(['auth', 'verified'])->name('services-edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/guardar-activo', [ActivesController::class, 'guardar'])->name('guardarActivo');
Route::post('/guardar-proveedor', [SuppliersController::class, 'save'])->name('guardarProveedor');
Route::post('/guardar-ticket', [TicketsController::class, 'saveTicket'])->name('guardarTicket');
Route::post('/guardar-servicios', [ServicesController::class, 'guardarServicios'])->name('guardar-servicios');


require __DIR__.'/auth.php';
