<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendedorController;

 
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Grupo de rutas protegidas para administradores
// Este middleware garantiza que solo los usuarios autenticados puedan acceder a las rutas protegidas.

Route::middleware(['auth', 'role:admin'])->group(function () {
        // Ruta al dashboard de administrador
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Si el usuario no tiene el rol requerido, probablemente se redirigirá a una página de acceso denegado 
// o se lanzará un error HTTP 403.
Route::middleware(['auth', 'role:vendedor'])->group(function () {
    Route::get('/vendedor/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
});