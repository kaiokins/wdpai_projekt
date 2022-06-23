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

        if(isset($user))
        {
//            if ($user->getEmail() !== $email){
//            }
            if (!password_verify($password, $user->getPassword())){
//          echo $user->getPassword();
                return $this->render( 'login', ['messages' => ['Nieprawidłowe hasło']]);
//          $user->getPassword() !== $password
            }
        }
        else
        {
            return $this->render( 'login', ['messages' => ['Użytkownik z tym e-mailem nie istnieje']]);
        }

        $_SESSION['loggedUserMail'] = $user->getEmail();
        $_SESSION['loggedUserRole'] = $user->getRole();
        $_SESSION['loggedUserId'] = $user->getRole();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }

    public function logout() {
        if(isset($_SESSION['loggedUserMail']))
            unset($_SESSION['loggedUserMail']);

        if(isset($_SESSION['loggedUserRole']))
            unset($_SESSION['loggedUserRole']);

        if(isset($_SESSION['loggedUserId']))
            unset($_SESSION['loggedUserId']);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
}