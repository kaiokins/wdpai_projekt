<?php
session_start();
require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');

Router::get('', 'DashboardController');
Router::get('dashboard', 'DashboardController');
Router::get('projects', 'ProjectsController');
Router::get('login', 'LoginController');
Router::get('contact', 'ContactController');
Router::post('addgame', 'AddGameController');
Router::get('ranking', 'RankingController');
Router::post('loginValidate', 'SecurityController');
Router::get('logout', 'SecurityController');
Router::get('register', 'RegisterController');

Router::run($path);
