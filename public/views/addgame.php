<?php
    $title = "GameRate | Dodaj grę";
    include 'toInclude/header.php';
    include 'toInclude/nav.php';
?>

  <main class="wrapper">
        <div class="form-style">
              <form class="style-to-form" action="addgame" method="POST" enctype="multipart/form-data" name="addgame">

                  <div class="message">
                      <?php
                      if (isset($messages))
                      {
                          foreach ($messages as $message)
                              echo $message;
                      }
                      ?>
                  </div>

                  <p><i class="fa-solid fa-plus"></i> Dodaj grę</p>

                  <input name="title" type="text" placeholder="Tytuł gry">
                  <input name="platform" type="text" placeholder="Platforma">
                  <input name="datepremiere" type="text" placeholder="Premiera [Rok-Miesiąc-Dzień]">
                  <input name="type" type="text" placeholder="Rodzaj gry">
                  <textarea name="description" id="" cols="30" rows="10" placeholder="Opis gry"></textarea>
                  <input type="file" name="file">
                  <button type="submit">Dodaj</button>
              </form>
        </div>
  </main>
    <script type="text/javascript" src="/public/js/addgame-date-validation.js"></script>
<?php
    include 'toInclude/footer.php';
?>