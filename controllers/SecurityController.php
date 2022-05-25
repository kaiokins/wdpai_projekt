<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function loginValidate(){
        $user = new User('kuba@godfryd.com', password_hash('admin', PASSWORD_BCRYPT), 'Jakub', 'Godfryd');

        $email = $_POST['email'];
        $password = $_POST['password'];

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