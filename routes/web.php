<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ForumController;
use App\Models\Forum;
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
})->name('home');

// Routes des étudiants
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('create/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('edit/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');

// Routes des users
Route::get('/users',[UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/registration',[UserController::class, 'create'])->name('user.create');
Route::post('/registration',[UserController::class, 'store'])->name('user.store');

//  Routes authentification
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

// Routes de forum
Route::middleware('auth')->group(function(){
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/create/forum', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/create/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/show/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
    Route::get('/edit/forum/{forum}', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/edit/forum/{forum}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{forum}', [ForumController::class, 'destroy'])->name('forum.destroy');
});

// Routes de folder
Route::middleware('auth')->group(function(){
    Route::get('/folder', [FolderController::class, 'index'])->name('folder.index');
    Route::get('/create/folder', [FolderController::class, 'create'])->name('folder.create');
    Route::post('/create/folder', [FolderController::class, 'store'])->name('folder.store');
    Route::get('/show/folder/{folder}', [FolderController::class, 'show'])->name('folder.show');
    Route::get('/edit/folder/{folder}', [FolderController::class, 'edit'])->name('folder.edit');
    Route::put('/edit/folder/{folder}', [FolderController::class, 'update'])->name('folder.update');
    Route::delete('/folder/{folder}', [FolderController::class, 'destroy'])->name('folder.destroy');
});
// Route pour les langues
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');