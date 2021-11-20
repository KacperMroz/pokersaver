<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('start', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('signup', 'DefaultController');
Routing::run($path);
