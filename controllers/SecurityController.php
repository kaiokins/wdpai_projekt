<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function loginValidate(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if ($user->getEmail() !== $email){
            return $this->render( 'login', ['messages' => ['Użytkownik z tym e-mailem nie istnieje']]);
        }
        if (!password_verify($password, $user->getPassword())){
//          echo $user->getPassword();
            return $this->render( 'login', ['messages' => ['Nieprawidłowe hasło']]);
//          $user->getPassword() !== $password
        }

        $_SESSION['loggedUser'] = $email;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/addgame");
    }

    public function logout() {
        if(isset($_SESSION['loggedUser']))
            unset($_SESSION['loggedUser']);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
}