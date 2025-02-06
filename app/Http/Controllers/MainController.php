<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Services\Operations;

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
        //show new note view

        return view('new_note');

    }

    public function editNote($id){

        $id = Operations::decryptID($id);
        echo "edit note page";
    }

    public function deleteNote($id){
        $id = Operations::decryptID($id);
        echo "delete note page";
    }

}
