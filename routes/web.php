<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNoteLogged;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;


//auth routes
//ó são acessíveis se o usuári NÃO estiver logado
Route::middleware([CheckIsNoteLogged::class])->group((function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
}));


Route::middleware([CheckIsLogged::class])->group((function(){
//rotas que só são acessíveis se estiver usuário logado
        Route::get('/', [MainController::class,'index'])->name('home');
        Route::get('/newNote',[MainController::class,'newNote'])->name('new');

        //editting notes
        Route::get('/editNote/{id}',[MainController::class,'editNote'])->name('edit');

        //deletting notes
        Route::get('/deleteNote/{id}',[MainController::class,'deleteNote'])->name('delete');


        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        }
    )
);
