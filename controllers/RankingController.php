<?php
require_once 'AppController.php';

require_once 'RankingController.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../repository/GameRepository.php';

class RankingController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->GameRepository = new GameRepository();
    }

    public function ranking()
    {
        $games = $this->GameRepository->getGames();
        $this->render('ranking', ['games' => $games]);
    }
}