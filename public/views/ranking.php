<?php
    $title = "GameRate | Ranking";
    include 'toInclude/header.php';
    include 'toInclude/nav.php';
?>

  <main class="ranking-wrapper">
        <input placeholder="Wyszukaj gry">

        <div class="sort">
              <p class="sort-button" data-type="rate" data-asc="0">Ocena <i class="fa-solid fa-sort-down"></i></p>
              <p class="sort-button" data-type="datepremiere" data-asc="0">Data premiery <i class="fa-solid fa-sort-down"></i></p>
              <p class="sort-button" data-type="platform" data-asc="0">Platforma <i class="fa-solid fa-sort-down"></i></p>
              <p class="sort-button" data-type="type" data-asc="0">Rodzaj <i class="fa-solid fa-sort-down"></i></p>
        </div>

      <div class="message">
          <?php
          if (isset($messages))
          {
              foreach ($messages as $message)
                  echo $message;
          }
          ?>
      </div>

      <section class="all-games">
          <?php foreach ($games as $game): ?>
              <div class="game" id="<?= $game->getId() ?>">

                  <div class="game-img">
                        <img src="public/uploads/<?= $game->getPicture() ?>">
                  </div>

                  <div class="game-info">
                        <h3><?= $game->getName() ?></h3>
                        <p>Platforma:</p>
                        <p><?= $game->getPlatform() ?></p>
                        <p>Data premiery:</p>
                        <p><?= $game->getDatepremiere() ?></p>
                        <p>Rodzaj:</p>
                        <p><?= $game->getType() ?></p>
                  </div>

                  <div class="game-desc">
                        <p><?= $game->getDescription() ?></p>
                  </div>

                  <div class="game-rate">
                        <div class="rate"><?= (($game->getRates()) ? round($game->getRates()) : 0) ?></div>
                  </div>

                  <?php
                  if(isset($_SESSION['loggedUserId']))
                      echo '
                          <div class="game-rate-user">
                              <form action="ranking" method="POST">
                                  <input placeholder="(0-100)" min="0" max="100" type="number" class="rate-error" name="user-rate">
                                  <input type="hidden" name="game_id" value="'.$game->getId().'">
                                  <button type="submit">Oceń</button>
                              </form>
                          </div>
                           ';
                  ?>
            </div>
          <?php endforeach; ?>
      </section>
  </main>

 <template class="ranking-wrapper" id="game-template">
    <div class="game">

        <div class="game-img">
            <img src="">
        </div>

        <div class="game-info">
            <h3></h3>
            <p class="bold-text">Platforma:</p>
            <p class="platform"></p>
            <p class="bold-text">Data premiery:</p>
            <p class="datepremiere"></p>
            <p class="bold-text">Rodzaj:</p>
            <p class="type"></p>
        </div>

        <div class="game-desc">
            <p class="description"></p>
        </div>

        <div class="game-rate">
            <div class="rate"></div>
        </div>

        <?php
        if(isset($_SESSION['loggedUserId']))
            echo '
                  <div class="game-rate-user">
                      <form action="ranking" method="POST">
                          <input placeholder="(0-100)" min="0" max="100" type="number" name="user-rate">
                          <input type="hidden" name="game_id" value="'.$game->getId().'">
                          <button type="submit">Oceń</button>
                      </form>
                  </div>
                  ';
        ?>
    </div>
 </template>
    <script type="text/javascript" src="/public/js/rate-validation.js"></script>
<?php
    include 'toInclude/footer.php';
?>