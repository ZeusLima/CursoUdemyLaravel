<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//auth routes
Route::get('/login', [AuthController::class, 'login']);
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);


Route::Middleware([CheckIsLogged::class])->group((function(){
//rotas que só são acessíveis se estiver usuário logado
        Route::get('/', [MainController::class,'index']);
        Route::get('/newNote',[MainController::class,'newNote' ]);
        Route::get('/logout',[AuthController::class, 'logout']);
        }
    )
);