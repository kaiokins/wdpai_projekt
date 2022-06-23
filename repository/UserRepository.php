<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM users WHERE Email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['fk_role'],
            $user['id_user']
        );
    }

    public function addUser(User $user)
    {
        $dbh = $this->database->connect();
        $stmt = $dbh->prepare('
            INSERT INTO userdetails (name, surname, createddate, createdtime) VALUES (?, ?, ?, ?)
        ');
        $dbh->beginTransaction();
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            date("Y-m-d"),
            date("H:i:s"),
        ]);
        $dbh->commit();
        $userDetailId = $dbh->lastInsertId();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, fk_userdetail, fk_role) VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $userDetailId,
            2
        ]);
    }

//    public function getUserDetailsId(User $user): int
//    {
//        $stmt = $this->database->connect()->prepare('
//            SELECT * FROM userdetails WHERE name = :name AND surname = :surname
//        ');
//
//        $name = $user->getName();
//        $surname = $user->getSurname();
//        $stmt->bindParam(':name',$name, PDO::PARAM_STR);
//        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
//        $stmt->execute();
//
//        $data = $stmt->fetch(PDO::FETCH_ASSOC);
//        return $data['id_userdetail'];
//    }
}