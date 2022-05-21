<?php

require_once 'RankingController.php';

class RankingController extends AppController {

    public function ranking() {
        return $this->render('ranking');
    }
}