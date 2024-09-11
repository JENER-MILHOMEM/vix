<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\testsController;
use App\Http\Controllers\userController;
use App\Actions\Fortify\CreateNewUser;
use GuzzleHttp\Middleware;

Route::get('/', [testsController::class, 'index']);
/* Route::get('', [testsController::class, 'login']); */
Route::get('/criarProjeto', [testsController::class, 'projetc'])->Middleware('auth:sanctum');
Route::post('/projetos/create', [testsController::class, 'store']);
Route::get('/projetosGet', [testsController::class, 'getProjects'])->Middleware('auth:sanctum');
Route::get('/projetos/{id}', [testsController::class, 'showProjects']);
Route::get('/users', [userController::class, 'getUsers'])->Middleware('auth:sanctum');
Route::get('/delete/{id}', [testsController::class, 'destroy']);
/* Route::put('/profile/update', [userController::class, 'update'])->name('profile.update')->Middleware('auth:sanctum');
Route::get('/profile/edit', [userController::class, 'viewUpdate'])->name('profile.edit')->Middleware('auth:sanctum'); */
Route::get('/users/edit/{id}', [userController::class, 'edit'])->Middleware('auth:sanctum');
Route::put('/users/update/{id}', [userController::class, 'update'])->Middleware('auth:sanctum');



//php artisan make:model NomeDoModel -m -c (cria o model, model, controller)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
