<?php
session_start();
require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');

Router::get('', 'DashboardController');
Router::get('login', 'LoginController');
Router::get('contact', 'ContactController');
Router::post('addgame', 'AddGameController');
Router::get('ranking', 'RankingController');
Router::post('loginValidate', 'SecurityController');
Router::get('logout', 'SecurityController');
Router::get('register', 'RegisterController');
Router::post('search', 'RankingController');
Router::post('addRate', 'RankingController');

Router::run($path);
