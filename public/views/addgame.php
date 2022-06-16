    <?php
        $title = "GameRate | Dodaj grę";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
      <main class="addgame-wrapper">
            <div class="addgame">
                  <form class="addgame-form">
                        <p><i class="fa-solid fa-plus"></i> Dodaj grę</p>
                        <input name="title" type="text" placeholder="Tytuł gry">
                        <input name="platform" type="text" placeholder="Platforma">
                        <input name="premiere" type="text" placeholder="Premiera">
                        <input name="type" type="text" placeholder="Rodzaj gry">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Opis gry"></textarea>
                        <button>Dodaj</button>
                  </form>
            </div>
      </main>
    <?php
        include 'toInclude/footer.php';
    ?>