<?php

require_once 'AppController.php';

class AddGameController extends AppController {

    public function addgame() {
        return $this->render('addgame');
    }
}