<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('start', 'DefaultController');
Routing::get('log', 'DefaultController');
Routing::get('signup', 'DefaultController');
Routing::get('main', 'DefaultController');
Routing::get('session', 'DefaultController');
Routing::get('add_note', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('note_description', 'DefaultController');
Routing::get('notes_page', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addNote', 'NoteController');
Routing::run($path);
