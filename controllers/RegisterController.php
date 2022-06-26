<?php

require_once 'AppController.php';

require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class RegisterController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function register()
    {
        if (!$this->isPost())
        {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $role = 2;

        if ($password !== $confirmedPassword)
        {
            return $this->render('register', ['messages' => ['Hasłą są różne']]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return $this->render('register', ['messages' => ['Niepoprawny adres email']]);
        }

        $user = new User($email, password_hash($password, PASSWORD_BCRYPT), $role, null, $name, $surname);
        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Zarejestrowałeś się pomyślnie']]);
    }
}