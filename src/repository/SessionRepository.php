<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Session.php';

class SessionRepository extends Repository
{

    public function addSession(Session $session, $id): void{
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.session (user_id, title, buyin, cashout, result, duration) VALUES (?, ?, ?, ?, ?, ?);
        ');

        $stmt->execute([
            $id,
            $session->getTitle(),
            $session->getBuyin(),
            $session->getCashout(),
            $session->getResult(),
            $session->getDuration(),
        ]);
    }

    public function getSessions($id): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM session WHERE session .user_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($sessions as $session){
            $result[] = new Session(
                $session['title'],
                $session['buyin'],
                $session['cashout'],
                $session['duration']
            );
        }
        return $result;
    }
}