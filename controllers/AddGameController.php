<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../repository/GameRepository.php';

class AddGameController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/public/uploads/';

    private $messages = [];

    public function __construct()
    {
        parent::__construct();
        $this->gameRepository = new GameRepository();
    }

    public function addgame()
    {

        if(isset($_SESSION['loggedUserRole']) && $_SESSION['loggedUserRole']!=1)
            return $this->render("permission");

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $game = new Game($_FILES['file']['name'], $_POST['title'], $_POST['platform'], $_POST['datepremiere'], $_POST['type'], $_POST['description']);
            $this->gameRepository->addGame($game);

            return $this->render("addgame", ['messages' => $this->messages]);
        }
        return $this->render("addgame", ['messages' => $this->messages]);
    }

    private function validate(array $file)
    {
        if($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = 'Plik jest zbyt duży';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES))
        {
            $this->messages[] = 'Nieodpowiedni typ pliku';
            return false;
        }

        return true;
    }
}