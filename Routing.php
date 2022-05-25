<?php

require_once __DIR__.'/controllers/DashboardController.php';
require_once __DIR__.'/controllers/ProjectsController.php';
require_once __DIR__.'/controllers/LoginController.php';
require_once __DIR__.'/controllers/ContactController.php';
require_once __DIR__.'/controllers/AddGameController.php';
require_once __DIR__.'/controllers/RankingController.php';
require_once __DIR__.'/controllers/SecurityController.php';

class Router {

    public static $routes;

    public static function get($url, $view)
    {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view)
    {
        self::$routes[$url] = $view;
    }

    static public function run(string $path) {
       
        // if($path === 'dashboard') {
        //     $object = new DashboardController;
        //     $object->$path();
        // }

        // projects         projects
        // projects/456     projects    456

        $urlParts = explode("/", $path);
        $action = $urlParts[0];

        if (!array_key_exists($action, self::$routes)) {
            // TODO render index page
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';
        $id = $urlParts[1] ?? '';

        $object->$action($id);
    }
}