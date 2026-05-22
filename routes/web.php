<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- RUTAS DE ACCESO ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', function () {
    return view('register');
})->name('register');

// --- RUTAS DE CONTENIDO (PÚBLICAS) ---
Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/tips', [PostController::class, 'index'])->name('tips.index');
Route::get('/category/{name}', [PostController::class, 'category'])->name('category.show');

// --- RUTAS PROTEGIDAS (REQUIEREN AUTENTICACIÓN) ---
Route::middleware(['auth'])->group(function () {
    // Posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/tips/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/tips/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/tips/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Administración
    Route::get('/admin/usuarios', [AdminController::class, 'index'])->name('admin.usuarios');
    Route::put('/admin/usuarios/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    Route::post('/admin/usuarios', [AdminController::class, 'storeUser'])->name('admin.storeUser');
    Route::delete('/admin/usuarios/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // Perfil de Usuario
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');
});

// --- OTRAS RUTAS ---
Route::get('/tema/{opcion}', function ($opcion) {
    return redirect()->back()->cookie('tema_preferido', $opcion, 60 * 24 * 30);
})->name('tema.set');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
