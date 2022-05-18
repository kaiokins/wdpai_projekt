<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');

Router::get('', 'DashboardController');
Router::get('dashboard', 'DashboardController');
Router::get('projects', 'ProjectsController');
Router::get('login', 'LoginController');

Router::run($path);
