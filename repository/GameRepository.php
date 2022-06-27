<?php

require_once 'Repository.php';

require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Rate.php';

class GameRepository extends Repository
{
    public function getGames()
    {
        $result = array();

        $stmt = $this->database->connect()->prepare
        ('
            select id_game, picture, name, platform, type, datepremiere,description, avg(rate) as rate from games left join rates on games.id_game = rates.fk_game GROUP BY id_game 
        ');

        $stmt->execute();
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($games as $game)
        {
            $result[] = new Game
            (
                $game['picture'],
                $game['name'],
                $game['platform'],
                $game['datepremiere'],
                $game['type'],
                $game['description'],
                $game['id_game'],
                $game['rate']
            );
        }
        return $result;
    }

    public function addGame(Game $game)
    {
        $dbh = $this->database->connect();
        $stmt = $dbh->prepare
        ('
            INSERT INTO games (picture, name, platform, datepremiere, type, description) VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute
        ([
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

        $stmt = $this->database->connect()->prepare
        ('
        select id_game, picture, name, platform, type, datepremiere,description, avg(rate) as rate from games left join rates on games.id_game = rates.fk_game WHERE LOWER(name) LIKE :search OR LOWER(description) LIKE :search GROUP BY id_game order by id_game
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGameBySort(string $sort, int $asc)
    {

        $stmt = $this->database->connect()->prepare
        ('
        select id_game, picture, name, platform, type, datepremiere,description, avg(rate) as rate from games left join rates on games.id_game = rates.fk_game GROUP BY id_game order by '.$sort.' '.(($asc) ? 'ASC' : 'DESC').'
        ');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRate(Rate $rate)
    {
        $dbh = $this->database->connect();
        $stmt = $dbh->prepare
        ('
            SELECT function_addrate(?, ?, ?)
        ');

        $stmt->execute
        ([
            $rate->getGame(),
            $rate->getUser(),
            $rate->getRate()
        ]);
    }

    public function getRateUser(string $id_game, string $user_id)
    {
        $stmt = $this->database->connect()->prepare
        ('
        select fk_game, fk_user, rate from rates left join games on rates.fk_game = games.id_game where fk_game = :id_game AND fk_user = :user_id
        ');

        $stmt->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $rate = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rate == false)
            return null;

        return new Rate
        (
            $rate['fk_game'],
            $rate['fk_user'],
            $rate['rate'],
        );
    }
}