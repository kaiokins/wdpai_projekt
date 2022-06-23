<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Rate.php';

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
            $game['id_game'],
        );
    }

    public function getGames()
    {
        $result = array();
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM view_getgames
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
                $game['id_game'],
                $this->getRates($game['id_game'])
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

    public function addRate(Rate $rate)
    {
        $dbh = $this->database->connect();
//        $userDetailId = $dbh->lastInsertId();
        $stmt = $dbh->prepare('
            INSERT INTO rates (fk_game, fk_user, rate) VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $rate->getGame(),
            $rate->getUser(),
            $rate->getRate()
        ]);
    }


    public function getRates(string $id_game)
    {
        $result = array();
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM rates WHERE fk_game = :id_game 
        ');
        $stmt->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        $stmt->execute();

        $rates = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rates == false) {
            return null;
        }
        foreach ($rates as $rate) {
            $result[] = new Rate(
                $rate['fk_game'],
                $rate['fk_user'],
                $rate['rate'],
            );
        }
        return $result;
    }

    public function getRateUser(string $id_game, string $user_id)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM rates WHERE fk_game = :id_game AND fk_user = :user_id
        ');
        $stmt->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $rate = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rate == false) {
            return null;
        }

        return new Rate(
            $rate['fk_game'],
            $rate['fk_user'],
            $rate['rate'],
        );
    }
}