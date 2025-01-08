<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                    'text_username' => 'required',
                    'text_password' => 'required'
                ]
                );

            //echo 'login submit';
            //dd($request);
            //echo "<br>";
            //echo $request->input('text_username');
        }
}
