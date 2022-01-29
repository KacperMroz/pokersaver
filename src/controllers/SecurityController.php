<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
        $userRepository = new UserRepository();


        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this ->render('login', ['messages' => ['User not exist!']]);
        }


        if($user->getEmail() !== $email){
            return $this ->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if(!password_verify($password, $user->getPassword())){
            return $this ->render('login', ['messages' => ['Wrong password!']]);
        }

        if(!isset($_COOKIE['user'])){
            $cookie_email = $user->getEmail();
            $cookie_id = $user->getId();
            setcookie('user', $cookie_email, time()+(86400*30), '/');
            setcookie('id', $cookie_id, time()+(86400*30), '/');
        }


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/main");
    }

    public function logout(){
        if(isset($_COOKIE['user'])){
            setcookie('user', '', time()-(86400*30), '/');
            setcookie('id', '', time()-(86400*30), '/');
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function signup(){
        if(!$this->isPost()){
            return $this->render('signup_page');
        }
        $user = new User(
            null,
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            $_POST['username']
        );

        $message = $this->userRepository->saveUser($user);
        return $this ->render('login', ['messages' => [$message]]);
    }

}