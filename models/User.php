<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role;
    private $id;

    public function __construct(string $email, string $password, int $role, int $id=null, string $name="", string $surname="")
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function getId(): string
    {
        return $this->id;
    }
}