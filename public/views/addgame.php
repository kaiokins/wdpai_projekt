    <?php
        $title = "GameRate | Dodaj grę";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
      <main class="addgame-wrapper">
            <div class="addgame">
                  <form class="addgame-form" action="addgame" method="POST" enctype="multipart/form-data">
                      <div class="message">
                          <?php
                          if (isset($messages)){
                              foreach ($messages as $message) {
                                  echo $message;
                              }
                          }
                          ?>
                      </div>
                        <p><i class="fa-solid fa-plus"></i> Dodaj grę</p>
                        <input name="title" type="text" placeholder="Tytuł gry">
                        <input name="platform" type="text" placeholder="Platforma">
                        <input name="datepremiere" type="text" placeholder="Premiera">
                        <input name="type" type="text" placeholder="Rodzaj gry">
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Opis gry"></textarea>
                        <input type="file" name="file">
                        <button type="submit">Dodaj</button>
                  </form>
            </div>
      </main>
    <?php
        include 'toInclude/footer.php';
    ?>