    <?php
        $title = "GameRate | Kontakt";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
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
    <?php
        include 'toInclude/footer.php';
    ?>