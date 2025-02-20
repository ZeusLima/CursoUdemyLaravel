<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AuthController extends Controller
{
        public function login()
        {
            return view('login');
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

            //get user input
            $username = $request->input('text_username');
            $password = $request->input('text_password');

            // //get all users from db
            // $users = User::all()->toArray();
            //$userModel = new User();


            // echo '<pre>';
            // print_r($users);
            // echo '<pre>';



//test connection database
// try {
//     DB::connection()->getPdo();
//     echo "connection succeed";
//     //code...
// } catch (\PDOException $e) {
//     echo "connection fail" . $e->getMessage();
// }


            //validação de usuário. 1) Checar se existe usuário
            $user = User::where('username', $username)
                        ->where('deleted_at', NULL)
                        ->first();

            if(!$user){
                return redirect()
                        ->back()
                        ->withInput()
                        ->with('loginError','Username ou password Incorreto');
            }

            //dd($password);
            if( !password_verify($password, $user->password) ){

                return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError','Username ou password Incorreto');

            }

            //echo "LOGOU";
            //update last login
            $user->last_login = date('y-m-d H-i-s');
            $user->save();

            //login user
            session([
                'user' => [
                    'id' =>$user->id,
                    'username' => $user->username,
                    'last_login' => $user->last_login
                ]

            ]);
            

            //foi validado, direcionar para home
            return redirect()->to('/');



//echo 'login submit efetivo';
//dd($request);
//echo $username;
//echo $request->input('text_username');
        }

        public function logout()
        {
            //logout from application

            session()->forget('user');
            return redirect()->to('/login');
        }
}
