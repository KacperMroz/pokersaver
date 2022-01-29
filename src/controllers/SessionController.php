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
        $this->sessions = $this->sessionRepository->getSessions($this->id);
    }

    public function addSession(){

        if($this->isPost()){

            $session = new Session($_POST['title'], $_POST['buyin'], $_POST['cashout']);
            $this->sessionRepository->addSession($session, $this->id);


            return $this->render('sessions', [
                'messages' => $this->messages,
                'sessions' => $this->sessionRepository->getSessions($this->id),
            ]);
        }
    }

    public function sessions(){
        $sessions = $this->sessionRepository->getSessions($this->id);
        $this->render('sessions', ['sessions' => $sessions]);
    }

    public function profile(){

        $this->sessionCount = sizeof($this->sessions);

        $result = $this->getResultsSum();

        $this->render('profile',
            [
                'sessionCount' => $this->sessionCount,
                'result' => $result,
                'average' => $result/$this->sessionCount
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

}