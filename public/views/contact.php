<!DOCTYPE html>
<html lang="pl">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="/public/css/style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
      <title>GameRate - serwis do oceniania gier</title>
</head>

<body>
        <div class="nav">
            <a class="logo" href="/"><img src="/assets/img/logo.png" alt="GameRate" class="logo"></a>
            <ul>
                <li><a href="/" class="href">Główna</a></li>
                <li><a href="/ranking" class="href">Ranking gier</a></li>
                <li><a href="/addgame" class="href">Dodaj grę</a></li>
                <li><a href="/contact" class="href">Kontakt</a></li>
                <?php
                if(!isset($_SESSION['loggedUser']))
                    echo '<li><a href="/login" class="href">Logowanie</a></li>';
                else
                    echo '<li><a href="/logout" class="href">Wyloguj się</a></li>';
                ?>
            </ul>
        </div>
      <main class="contact-wrapper">
            <div class="contact">
                  <div class="contact-form-wrapper">
                        <form class="contact-form">
                              <p><i class="fa-solid fa-message "></i> Kontakt</p>
                              <input name="imie" type="text" placeholder="Imię">
                              <input name="email" type="text" placeholder="Email">
                              <textarea name="" id="" cols="30" rows="10" placeholder="Wpisz wiadomość..."></textarea>
                              <button>Wyślij wiadomość</button>
                        </form>
                  </div>
                  <div class="about">
                        <div class="about-us">
                              <p><i class="fa-solid fa-address-card"></i> O nas</p>
                              <p>Jesteśmy grupą osób zajmującą się rozwijaniem serwisu do oceniania gier. </p>
                        </div>
                        <div class="number">
                              <p><i class="fa-solid fa-phone"></i> Telefon</p>
                              <p>123 456 789</p>
                        </div>
                        <div class="Email">
                              <p><i class="fa-solid fa-envelope"></i></i> Email</p>
                              <p>game@rate.pl</p>
                        </div>
                        <div class="adress">
                              <p><i class="fa-solid fa-location-dot"></i> Siedziba</p>
                              <p>ul. Krakowska 150, 30-063 Kraków</p>
                        </div>

                  </div>
            </div>
      </main>
</body>

</html>