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

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->GameRepository->getGameByName($decoded['search']));
        }
    }
}