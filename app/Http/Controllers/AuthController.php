<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
        public function login()
        {
            return view('login');
        }

        public function logout()
        {
            echo 'logout';
        }

        public function loginSubmit(Request $request)
        {
            //form validation
             $request->validate(
                [
                    'text_username' => 'required|email',
                    'text_password' => 'required|min:8|max:16'
                ],
            //errror messages
                [            
                    'text_username.required' => "o username é obrigatóriox",
                    'text_username.email' => 'username deve ser um e-mail válido',
                    
                    'text_password.required' => 'o password é obrigatório',
                    'text_password.min' => "mínimo de :min dígitos no password",
                    'text_password.max' => "máximo de :max dígitos no password"
                ]
            );

            $username = $request->input('text_username');
            $password = $request->input('text_password');

            //test database
            try {
                DB::connection()->getPdo();
                echo "connection succeed";
                //code...
            } catch (\PDOException $e) {
                echo "connection fail" . $e->getMessage();
            }



            //echo 'login submit efetivo';
            //dd($request);
            //echo $username;
            //echo $request->input('text_username');
        }
}
