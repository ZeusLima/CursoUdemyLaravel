<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;

class MainController extends Controller{

    public function index()
        {

            //load user's notes
            $id = session('user.id');
            //$user = User::find($id)->toArray();    ITS NOT NECESSARY TO GET THE USER THIS, 'CAUS ITS ALREADY AVAILBLE INT HE SESSION
            $notes = User::find($id)->notes()->get()->toArray();

            return view('home', ['notes' => $notes]);
        }

    public function newNote()
    {
        echo 'new note page';
        return view('top_bar');


    }

}
