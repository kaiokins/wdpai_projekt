<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Game.php';

class GameRepository extends Repository
{
    public function getGame(string $id_game)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM games WHERE id_game = :id_game
        ');
        $stmt->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($game == false) {
            return null;
        }

        return new Game(
            $game['picture'],
            $game['name'],
            $game['platform'],
            $game['datepremiere'],
            $game['type'],
            $game['description'],
        );
    }

    public function getGames()
    {
        $result = array();
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM games
        ');
        $stmt->execute();

        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($games as $game) {
            $result[] = new Game(
                $game['picture'],
                $game['name'],
                $game['platform'],
                $game['datepremiere'],
                $game['type'],
                $game['description'],
            );
        }

        return $result;
    }

    public function addGame(Game $game)
    {
        $dbh = $this->database->connect();
        $stmt = $dbh->prepare('
            INSERT INTO games (picture, name, platform, datepremiere, type, description) VALUES (?, ?, ?, ?, ?, ?)
        ');
        $stmt->execute([
            $game->getPicture(),
            $game->getName(),
            $game->getPlatform(),
            $game->getDatepremiere(),
            $game->getType(),
            $game->getDescription(),
        ]);
    }

    public function getGameByName(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM games WHERE LOWER(name) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}