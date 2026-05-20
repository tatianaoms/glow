<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\PostController;

Route::get('/set-tema/{color}', [TemaController::class, 'setTema'])->name('tema.set');
Route::get('/eliminar-tema', [TemaController::class, 'eliminarTema'])->name('tema.eliminar');

Route::get('/', [PostController::class, 'inicio'])->name('inicio');
Route::get('/tips', [PostController::class, 'index'])->name('tips.index');


// --- AUTENTICACIÓN ---
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/tips');
    }
    return back()->withErrors(['email' => 'Error en credenciales']);
})->name('login.post');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/categoria/{name}', [PostController::class, 'category'])->name('category.show');
Route::resource('posts', PostController::class)->middleware('auth');
