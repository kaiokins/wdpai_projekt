<?php

class Rate
{
    private $game;
    private $user;
    private $rate;

    public function __construct($game, $user, $rate)
    {
        $this->game=$game;
        $this->user=$user;
        $this->rate=$rate;
    }

    public function getGame()
    {
        return $this->game;
    }

    public function setGame($game)
    {
        $this->game = $game;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
    }
}