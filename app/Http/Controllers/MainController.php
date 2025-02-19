<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Services\Operations;
use Illuminate\Http\Request;

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

    public function newNoteSubmit(Request $request){
        $request->validate(
            [
                'text_title' => 'required|min:3|max:30',
                'text_note' => 'required|min:3|max:3000'
            ],
        //errror messages
            [
                'text_title.required' => "o title é obrigatóriox",
                'text_title.min' => 'mínimo de 3 caracteres',
                'text_title.max' => 'máximo de 30 c',

                'text_note.required' => "o title é obrigatóriox",
                'text_note.min' => 'mínimo de 3 caracteres',
                'text_note.max' => 'máximo de 3000 c',
            ]
        );

        echo 'ok';
        //get user id
        $id = session('user.id');
        
        //crea new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        //redirect home onde deve-se mostrar a nova nota
        return redirect()->route('home');

    }

    public function editNote($id){

        $id = Operations::decryptID($id);
        
        //load note
        $note = Note::find($id);

        //show edit note
        return view('edit_note', ['note' => $note ]);

    }

    public function deleteNote($id){
        $id = Operations::decryptID($id);
        echo "delete note page";
    }

}
