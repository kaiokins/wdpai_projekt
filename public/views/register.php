<?php
    $title = "GameRate | Rejestracja";
    include 'toInclude/header.php';
    include 'toInclude/nav.php';
?>

<main class="register">
    <div class="register">
        <form class="register-form" action="loginValidate" method="POST">
            <div class="message">
                <?php
                if (isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <p><i class="fa-solid fa-user-plus"></i> Rejestracja</p>
            <input name="email" type="email" placeholder="Email">
            <input name="name" type="text" placeholder="Imię">
            <input name="surname" type="text" placeholder="Nazwisko">
            <input name="password" type="password" placeholder="Hasło">
            <input name="confirmPassword" type="password" placeholder="Powtórz hasło">
            <button type="submit">Zarejestruj</button>
        </form>
    </div>
</main>

<?php
    include 'toInclude/footer.php';
?>