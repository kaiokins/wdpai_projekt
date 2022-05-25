<?php

require_once 'AppController.php';

class AddGameController extends AppController {

    public function addgame() {
        if(!isset($_SESSION['loggedUser'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        return $this->render('addgame');
    }
}