<?php

require_once 'AppController.php';

class LoginController extends AppController {

    public function login() {
        if(isset($_SESSION['loggedUserMail'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/");
        }
        return $this->render('login');
    }
}