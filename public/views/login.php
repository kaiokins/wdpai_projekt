    <?php
        $title = "GameRate | Login";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
      <main class="login">
            <div class="login">
                  <form class="login-form" action="loginValidate" method="POST">
                      <div class="message">
                          <?php
                          if (isset($messages)){
                              foreach ($messages as $message) {
                                  echo $message;
                              }
                          }
                          ?>
                      </div>
                        <p><i class="fa-solid fa-right-to-bracket"></i> Logowanie</p>
                        <input name="email" type="email" placeholder="Email">
                        <input name="password" type="password" placeholder="Hasło">
                        <button type="submit">Zaloguj</button>
                      <p class="register">Nie posiadasz konta? <a href="/register">Zarejestruj się!</a></p>
                  </form>
            </div>
      </main>
    <?php
        include 'toInclude/footer.php';
    ?>