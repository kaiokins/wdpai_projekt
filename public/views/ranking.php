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


      <div class="ranking-wrapper">
            <input placeholder="Wyszukaj grę">
            <div class="sort">
                  <p>Ocena <i class="fa-solid fa-sort-down"></i></p>
                  <p>Data premiery <i class="fa-solid fa-sort-down"></i></p>
                  <p>Platforma <i class="fa-solid fa-sort-down"></i></p>
                  <p>Rodzaj <i class="fa-solid fa-sort-down"></i></p>
            </div>

            <div class="game">

                  <div class="game-img">
                        <img src="/assets/img/gta_v.jpg" alt="">
                  </div>

                  <div class="game-info">
                        <h3>Grand Theft Auto V</h3>
                        <p>Platforma: PC</p>
                        <p>Data premiery: 14-05-2015</p>
                        <p>Rodzaj: Gra akcji</p>
                  </div>

                  <div class="game-desc">
                        <p>Bacon ipsum dolor amet brisket andouille rump, bresaola salami leberkas prosciutto short loin
                              corned beef turducken frankfurter
                              ball tip chislic. Beef ribs pig cupim, alcatra filet mignon meatloaf spare ribs pork belly
                              swine cow rump turducken picanha
                              drumstick. Sirloin tri-tip bresaola rump shoulder tenderloin. Kielbasa filet mignon
                              sausage corned beef drumstick rump meatloaf
                              porchetta pork loin. Kielbasa filet mignon sausage corned beef drumstick rump meatloaf
                              porchetta pork loin. Kielbasa filet mignon
                              sausage corned beef drumstick rump meatloaf porchetta pork loin.Kielbasa filet mignon
                              sausage corned beef drumstick rump
                              meatloaf porchetta pork loin. </p>
                  </div>

                  <div class="game-rate">
                        <div class="rate">86</div>
                  </div>

            </div>
      </div>


</body>

</html>