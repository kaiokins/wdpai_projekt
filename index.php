<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');

Router::get('', 'DashboardController');
Router::get('dashboard', 'DashboardController');
Router::get('projects', 'ProjectsController');
Router::get('login', 'LoginController');
Router::get('contact', 'ContactController');
Router::get('addgame', 'AddGameController');
Router::get('ranking', 'RankingController');

Router::run($path);
