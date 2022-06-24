<?php
require_once 'AppController.php';

require_once 'RankingController.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Rate.php';
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

    public function addRate() {
        $games = $this->GameRepository->getGames();
        if (!$this->isPost() || !isset($_SESSION['loggedUserId'])) {
            return  $this->render('ranking', ['games' => $games]);
        }

        $rate = $_POST['user-rate'];
        $gameId = $_POST['game_id'];
        $userId = $_SESSION['loggedUserId'];

        if ($rate <= 0 || $rate > 100) {
            return $this->render('ranking', ['messages' => ['Zakres oceny to 0-100'],'games' => $games]);
        }

        $userRate = $this->GameRepository->getRateUser($gameId,$userId);
        if(isset($userRate))
            return $this->render('ranking', ['messages' => ['Już oceniłeś tą gre'],'games' => $games]);

        $rated = new Rate($gameId, $userId, $rate);

        $this->GameRepository->addRate($rated);

        return $this->render('ranking', ['games' => $games]);
    }
}