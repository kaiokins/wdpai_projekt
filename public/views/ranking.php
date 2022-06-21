    <?php
        $title = "GameRate | Ranking";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
      <div class="ranking-wrapper">
            <input placeholder="Wyszukaj grę">
            <div class="sort">
                  <p>Ocena <i class="fa-solid fa-sort-down"></i></p>
                  <p>Data premiery <i class="fa-solid fa-sort-down"></i></p>
                  <p>Platforma <i class="fa-solid fa-sort-down"></i></p>
                  <p>Rodzaj <i class="fa-solid fa-sort-down"></i></p>
            </div>
          <?php foreach ($games as $game): ?>
            <div class="game">
                  <div class="game-img">
                        <img src="public/uploads/<?= $game->getPicture() ?>">
                  </div>

                  <div class="game-info">
                        <h3><?= $game->getName() ?></h3>
                        <p>Platforma: <?= $game->getPlatform() ?></p>
                        <p>Data premiery: <?= $game->getDatepremiere() ?></p>
                        <p>Rodzaj: <?= $game->getType() ?></p>
                  </div>

                  <div class="game-desc">
                        <p><?= $game->getDescription() ?></p>
                  </div>

                  <div class="game-rate">
                        <div class="rate">86</div>
                  </div>

            </div>
          <?php endforeach; ?>
      </div>

    <?php
        include 'toInclude/footer.php';
    ?>