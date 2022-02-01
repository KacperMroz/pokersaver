<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Note.php';

class NoteRepository extends Repository
{
    public function getNote(string $id):? Note
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.notes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();

        $note = $stmt->fetch(PDO::FETCH_ASSOC);

        if($note == false){
            return null;
        }
        return new Note(
            $note['title'],
            $note['descprition']
        );
    }

    public function addNote(Note $note, $user_id): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO notes (title, description, user_id)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $note->getTitle(),
            $note->getDescription(),
            $user_id
        ]);
    }

    public function getNotes($user_id): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE notes.user_id = :user_id
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
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

    public function getNoteByTitle(string $searchString, $user_id){
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM notes WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search AND notes.user_id = :user_id
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}