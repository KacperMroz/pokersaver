<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Note.php';

class NoteRepository extends Repository
{
    public function getNote(string $id): Note
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.notes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();

        $note = $stmt->fetch(PDO::FETCH_ASSOC);

//        if($note == false){
//            return null;
//        }
        return new Note(
            $note['title'],
            $note['descprition']
        );
    }

    public function addNote(Note $note): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO notes (title, description, user_id)
            VALUES (?, ?, ?)
        ');

        $assignedById = 1;
        $stmt->execute([
            $note->getTitle(),
            $note->getDescription(),
            $assignedById
        ]);
    }

    public function getNotes(){
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes
        ');
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($notes as $note){
            $result[] = new Note(
                $note['title'],
                $note['description']
            );
        }

        return $result;
    }


}