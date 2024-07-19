<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\SessionsController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/article/{article}', [ArticlesController::class, 'show']);// afficher un seul article
Route::get('/show', function (){
    return view('articles.show');
});
Route::get('/create-form', [ArticlesController::class,'create'])->middleware('admin');//afficher le fomulaire de creation d'articles
Route::post('/articles/create', [ArticlesController::class, 'store'])->middleware('admin'); //execute la fonction  de sauvegarde
Route::get('article/{article}/edit', [ArticlesController::class, 'edit'])->middleware('auth');//route  pour afficher le formulaire de  modification
Route::patch('article/{article}/edit', [ArticlesController::class, 'update'])->middleware('auth');// route pour gerer la modification
Route::delete('article/{article}/delete', [ArticlesController::class, 'delete'])->middleware('auth'); //route pour gerer la suppresiion
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');
