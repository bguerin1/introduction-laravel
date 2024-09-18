<?php

use App\Http\Middleware\CheckTodo;
use App\Http\Middleware\CheckContact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoControleur;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;
use App\Http\Controllers\AuthentificationControleur;

Route::get('/', function () {
    return view('welcome', ['titre' => 'Mon premier exemple.']);
});

Route::get('/ping', [PingPongControleur::class, 'ping']);
Route::get('/pong', [PingPongControleur::class, 'pong']);
Route::get('/flash', [TestFlashController::class, 'main']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);

Route::get('/todo', [TodoControleur::class, 'listTodo']);
Route::post('/todo', [TodoControleur::class, 'addTodo'])->middleware(CheckTodo::class);

Route::get('/termine/{id}', [TodoControleur::class, 'changeTodo']);
Route::get('/supp/{id}', [TodoControleur::class, 'suppTodo']);

Route::get('/contact', [ContactController::class, 'listContact']);
Route::post('/contact', [ContactController::class, 'addContact'])->middleware(CheckContact::class);

Route::get('/login', [AuthentificationControleur::class, 'login']);
Route::post('/traitementLogin', [AuthentificationControleur::class, 'traitementLogin']);
Route::get('/register', [AuthentificationControleur::class, 'register']);
Route::post('/traitementRegister', [AuthentificationControleur::class, 'traitementRegister']);
