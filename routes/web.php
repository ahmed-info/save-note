<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
//Route::redirect('/', 'notes/list');
Route::redirect('/', 'notes/list');

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');


Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login-user', [AuthController::class,'loginUser'])->name('loginUser');
Route::get('/register', [AuthController::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/register-user', [AuthController::class,'registerUser'])->name('registerUser');
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');
//Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('notes', [NoteController::class,'adminServices'])->name('notes');
Route::get('notes/report',[NoteController::class, 'report'])->name('notes.report');//ok

Route::get('notes/create',[NoteController::class, 'create'])->name('notes.create');//ok
Route::post('notes/create',[NoteController::class, 'store'])->name('notes.store');//ok
Route::get('notes/list',[NoteController::class, 'index'])->name('notes.list');//ok
Route::get('notes/trash',[NoteController::class, 'trash'])->name('notes.trash');//ok
Route::get('notes/edit/{id}',[NoteController::class, 'edit'])->name('notes.edit');//ok
Route::post('notes/update/{id}',[NoteController::class, 'update'])->name('notes.update');
Route::delete('notes/destroy/{id}',[NoteController::class, 'destroy'])->name('notes.destroy');//ok
Route::delete('notes/forceDelete/{id}',[NoteController::class, 'forceDelete'])->name('notes.forceDelete');//ok
Route::get('notes/restore/one/{id}',[NoteController::class, 'restore'])->name('notes.restore');//ok
Route::get('notes/restore_all/{id}',[NoteController::class, 'restore_all'])->name('notes.restore_all');//ok
// Route::group(['middleware' => ['auth']], function() {
//     /**
//     * Logout Route
//     */
//     Route::get('/logout', [LogoutController::class],'perform')->name('logout');
//  });

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('add-note',[NoteController::class, ''])->name('add-note');

//Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
