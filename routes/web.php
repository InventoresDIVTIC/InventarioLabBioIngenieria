<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

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

Route::get('/users-edit', function () {
    return view('users-edit');
})->middleware(['auth', 'verified'])->name('users-edit');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/guardar-activo', [ActivesController::class, 'guardar'])->name('guardarActivo');
    Route::patch('/editar-activo/{id}', [ActivesController::class, 'edit_actives'])->name('actives.edit');
    Route::patch('/editar-finanzas/{id}', [ActivesController::class, 'edit_actives_finanzas'])->name('actives.finanzas');
    Route::patch('/editar-proveeduria/{id}', [ActivesController::class, 'edit_actives_proveeduria'])->name('actives.proveeduria');
    Route::patch('/editar-baja/{id}', [ActivesController::class, 'edit_actives_baja'])->name('actives.delete');
    Route::post('/guardar-proveedor', [SuppliersController::class, 'save'])->name('guardarProveedor');
    Route::patch('/editar-proveedor/{id}', [SuppliersController::class, 'edit_suppliers'])->name('suppliers.edit');
    Route::post('/guardar-ticket', [TicketsController::class, 'saveTicket'])->name('guardarTicket');
    Route::patch('/editar-ticket/{id}', [TicketsController::class, 'edit_tickets'])->name('tickets.edit');
    Route::post('/guardar-servicios', [ServicesController::class, 'guardarServicios'])->name('guardar-servicios');
    Route::patch('/editar-servicios/{id}', [ServicesController::class, 'edit_services'])->name('services.edit');
    Route::patch('/editar-servicios-detalles/{id}', [ServicesController::class, 'edit_services_detalles'])->name('services.edit.detalles');
    Route::patch('/editar-servicios-firmas/{id}', [ServicesController::class, 'edit_services_firmas'])->name('services.edit.firmas');
    Route::patch('/editar-servicios-gastos/{id}', [ServicesController::class, 'edit_services_gastos'])->name('services.edit.gastos');
    Route::patch('/editar-usuarios/{id}', [UserController::class, 'users_edit'])->name('users.edit');
    Route::delete('/eliminar-usuarios/{id}', [UserController::class, 'users_destroy'])->name('users.destroy');
    Route::get('/editar-Activos-new/{id}', [ActivesController::class, 'Datotemp'])->name('inventory.Datotemp');
    Route::get('/crear-ticket/{id}', [ActivesController::class, 'DatotempTickets'])->name('inventory.DatotempTickets');
    Route::get('/dashboard', [DashboardController::class, 'MetricasDashboard'])->name('dashboard');
    Route::get('/actualizar-next-mprev', [DashboardController::class, 'actualizarNextMprev'])->name('actualizar.next.mprev');

});

require __DIR__.'/auth.php';
