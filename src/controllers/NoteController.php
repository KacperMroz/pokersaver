<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Note.php';
require_once __DIR__.'/../repository/NoteRepository.php';


class NoteController extends AppController
{
    private $messages = [];
    private $noteRepository;
    private $userRepository;
    private $id;

    public function __construct()
    {
        parent::__construct();
        $this->noteRepository = new NoteRepository();
        $this->userRepository = new UserRepository();
        $this->id = $_COOKIE['id'];
    }

    public function notes(){
        $notes = $this->noteRepository->getNotes($this->id);
        $this->render('notes', ['notes' => $notes]);
    }


    public function addNote()
    {
        if($this->isPost()){

            $note = new Note($_POST['title'], $_POST['description']);
            $this->noteRepository->addNote($note, $this->id);

            return $this->render('notes', [
                'messages' => $this->messages,
                'notes' => $this->noteRepository->getNotes($this->id)
            ]);
        }



        return $this->render('add_note', ['messages' => $this->messages]);
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->noteRepository->getNoteByTitle($decoded['search']));
        }
    }
}