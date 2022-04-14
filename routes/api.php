<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\NoteController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('notes',[NoteController::class,'index']);
    Route::get('note/{id}/show',[NoteController::class,'show']);
    Route::post('note/add',[NoteController::class,'store']);
    Route::post('note/{id}/update',[NoteController::class,'update']);
    Route::delete('note/{id}/delete',[NoteController::class,'destroy']);
});


 

