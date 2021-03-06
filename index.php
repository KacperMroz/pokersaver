<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('start', 'DefaultController');
Routing::get('log', 'DefaultController');
Routing::get('signup', 'SecurityController');
Routing::get('main', 'DefaultController');
Routing::get('add_session', 'DefaultController');
Routing::get('add_note', 'DefaultController');
Routing::get('profile', 'SessionController');
Routing::get('note_description', 'DefaultController');
Routing::get('notes', 'NoteController');
Routing::get('sessions', 'SessionController');
Routing::post('login', 'SecurityController');
Routing::post('addNote', 'NoteController');
Routing::post('addSession', 'SessionController');
Routing::post('search', 'NoteController');
Routing::post('logout', 'SecurityController');
Routing::run($path);
