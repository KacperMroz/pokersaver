<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    
    public function start(){
        $this->render('starting_page');
    }
    
    public function login(){
        $this->render('login');
    }

    public function signup(){
        $this->render('signup_page');
    }

    public function main(){
        $this->render('main_page');
    }

    public function session(){
        $this->render('session');
    }
}