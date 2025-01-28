<?php

namespace App\Http\Controllers;

class MainController extends Controller{

    public function index()
        {
            //load users notes

            //show home view
            return view('home');
        }

    public function newNote()
    {
        echo "criadno nova nota";
    }

}
