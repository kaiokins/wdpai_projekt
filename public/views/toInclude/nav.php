 <div class="nav">
        <a class="logo" href="/"><img src="/assets/img/logo.png" alt="GameRate" class="logo"></a>
        <ul>
            <li><a href="/" class="href">Główna</a></li>
            <li><a href="/ranking" class="href">Ranking gier</a></li>
            <li><a href="/addgame" class="href">Dodaj grę</a></li>
            <li><a href="/contact" class="href">Kontakt</a></li>
            <?php
            if(!isset($_SESSION['loggedUserMail']))
                echo '<li><a href="/login" class="href">Logowanie</a></li>';
            else
                echo '<li><a href="/logout" class="href">Wyloguj się</a></li>';
            ?>
        </ul>
 </div>