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
    <div class="wrapper">
        <div class="main">
            <div class="text">
                <h2>Oceniaj</h2>
                <h2>Wyszukuj</h2>
                <h2>Przeglądaj</h2>
            </div>
            <p class="text">Najpopularniejszy serwis do oceniania gier</p>
            <a href=" #" class="button">Przeglądaj gry</a>
        </div>
    </div>
</body>

</html>