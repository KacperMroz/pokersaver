<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Note.php';

class NoteController extends AppController
{
    private $messages = [];

    public function addNote()
    {
        if($this->isPost()){

            $note = new Note($_POST['title'], $_POST['description']);


            return $this->render('notes_page', ['messages' => $this->messages, 'note' => $note]);
        }



        return $this->render('add_note', ['messages' => $this->messages]);
    }
}