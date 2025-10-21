<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
// Routes des etudiants
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('create/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('edit/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');

// Routes des users
Route::get('/users',[UserController::class, 'index'])->name('user.index');
Route::get('/registration',[UserController::class, 'create'])->name('user.create');
Route::post('/registration',[UserController::class, 'store'])->name('user.store');

//  Routes authentification
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

