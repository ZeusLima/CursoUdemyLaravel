<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;

class MainController extends Controller{

    public function index()
        {

            //load user's notes
            $id = session('user.id');
            $user = User::find($id)->toArray();
            $notes = User::find($id)->notes()->get()->toArray();

            echo '<pre>';
            print_r($user);
            print_r($notes);

            die();

            return view('home');
        }

    public function newNote()
    {
        echo 'new note page';
        return view('top_bar');

        
    }

}