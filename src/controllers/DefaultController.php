<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    
    public function start(){
        $this->render('starting_page');
    }
    
    public function log(){
        $this->render('login');
    }


    public function main(){
        $this->render('main_page');
    }

    public function session(){
        $this->render('session');
    }

    public function note_description(){
        $this->render('note_description');
    }


    public function profile(){
        $this->render('profile');
    }

    public function add_note(){
        $this->render('add_note');
    }
}