    <?php
        $title = "GameRate | Kontakt";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
      <main class="contact-wrapper">
            <div class="contact">
                  <div class="contact-form-wrapper">
                        <form action="" class="contact-form" method="POST">
                              <p><i class="fa-solid fa-message "></i> Kontakt</p>
                              <input id="name" name="name" type="text" placeholder="Imię">
                              <input id="email" name="email" type="email" placeholder="Email">
                              <input id="'subject" name="subject" type="text" placeholder="Temat">
                              <textarea id="message" name="message" id="" cols="30" rows="10" placeholder="Wpisz wiadomość..."></textarea>
                              <button type="submit" onclick="sendEmail()">Wyślij wiadomość</button>
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

    <?php
        use PHPMailer\PHPMailer\PHPMailer;

        if(isset($_POST['email']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $mail = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            require_once '../../phpmailer/includes/PHPMailer.php';
            require_once '../../phpmailer/includes/SMTP.php';
            require_once '../../phpmailer/includes/Exception.php';

            $email = new PHPMailer();

            $email->isSMTP();
            $email->Host = "smtp.gmail.com";
            $email->SMTPAuth = true;
            $email->SMTPSecure = "ssl";
            $email->Port = 465;
            $email->Username = "otoautocomp2@gmail.com";
            $email->Password = "";

            $email->isHTML(true);
            $email->setFrom($email, $name);
            $email->addAddress("otoautocomp2@gmail.com");
            $email->Subject = ("$email ($subject)");
            $email->Body = $message;

            if ($email->send()) {
                $status = "Pomyślnie";
                $response = "Email wysłano";
            } else {
                $status = "Niepomyślnie";
                $response = "Coś poszło nie tak" . $email > ErrorInfo;
            }
            exit(json_encode(array("status" => $status, "response" => $response)));
        }
    ?>