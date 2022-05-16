<?php

require_once 'AppController.php';

class DashboardController extends AppController {

    public function index() {
        // TODO return and render display.html
        $hello = 'Welcome on Dahboard page!';
        return $this->render('index', ['greetings' => $hello]);
    }
}