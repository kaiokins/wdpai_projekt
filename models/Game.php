<?php

class Game
{
    private $picture;
    private $name;
    private $platform;
    private $datepremiere;
    private $type;
    private $description;
    private $id_game;
    private $user_id;
    private $ratesArray;

    public function __construct($picture, $name, $platform, $datepremiere, $type, $description, $id_game = null,$ratesArray=array())
    {
        $this->picture=$picture;
        $this->name=$name;
        $this->platform=$platform;
        $this->datepremiere=$datepremiere;
        $this->type=$type;
        $this->description=$description;
        $this->id_game=$id_game;
        $this->ratesArray=$ratesArray;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    public function getDatepremiere()
    {
        return $this->datepremiere;
    }

    public function setDatepremiere($datepremiere)
    {
        $this->datepremiere = $datepremiere;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id_game;
    }

    public function setId($id_game)
    {
        $this->id_game = $id_game;
    }

    public function getRates()
    {
        return $this->ratesArray;
    }

    public function getAvgRates()
    {
        $rates = $this->getRates();

        if(!isset($rates))
            return 0;

        $sum = 0;
        $counter = 0;
        foreach ($rates as $rate)
        {
            $sum+=$rate->getRate();
            $counter++;
        }

        return round($sum/$counter);
    }
}