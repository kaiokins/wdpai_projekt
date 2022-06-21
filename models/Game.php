<?php

class Game
{
    private $picture;
    private $name;
    private $platform;
    private $datepremiere;
    private $type;
    private $description;

    public function __construct($picture, $name, $platform, $datepremiere, $type, $description)
    {
        $this->picture=$picture;
        $this->name=$name;
        $this->platform=$platform;
        $this->datepremiere=$datepremiere;
        $this->type=$type;
        $this->description=$description;
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
}