<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/Session.php';
require_once __DIR__.'/../repository/SessionRepository.php';

class SessionController extends AppController
{

    private $messages = [];
    private $sessionRepository;
    private $userRepository;
    private $id;
    private $sessionCount;
    private $sessions;

    public function __construct()
    {
        parent::__construct();
        $this->sessionRepository = new SessionRepository();
        $this->userRepository = new UserRepository();
        $this->id = $_COOKIE['id'];
        $this->user = $this->userRepository->getUser($_COOKIE['user']);
        $this->sessions = $this->sessionRepository->getSessions($this->id);
    }

    public function addSession(){

        if($this->isPost()){

            $session = new Session($_POST['title'], $_POST['buyin'], $_POST['cashout'], $_POST['duration']);
            $this->sessionRepository->addSession($session, $this->id);


            return $this->render('sessions', [
                'messages' => $this->messages,
                'sessions' => $this->sessionRepository->getSessions($this->id),
            ]);
        }
    }

    public function sessions(){
        $this->render('sessions', ['sessions' => $this->sessions]);
    }

    public function profile(){

        $this->sessionCount = sizeof($this->sessions);

        $result = $this->getResultsSum();
        $duration = $this->getDurationSum();

        if($this->sessionCount == 0){
            $average = 0;
            $avgDuration = 0;
        }else {
            $average = $result/$this->sessionCount;
            $avgDuration = $duration/$this->sessionCount;
        }



        $username = $this->user->getUsername();

        $this->render('profile',
            [
                'sessionCount' => $this->sessionCount,
                'result' => $result,
                'average' => $average,
                'duration' => $duration,
                'avgDuration' => $avgDuration,
                'username' => $username
                ]
        );
    }

    private function getResultsSum(): float{
        $sum = 0.0;
        foreach ($this->sessions as $session){
            $sum += $session->getResult();
        }
        return $sum;
    }

    private function getDurationSum(): float{
        $sum = 0.0;
        foreach ($this->sessions as $session){
            $sum += $session->getDuration();
        }
        return $sum;
    }


}