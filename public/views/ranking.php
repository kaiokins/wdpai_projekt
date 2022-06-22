    <?php
        $title = "GameRate | Ranking";
        include 'toInclude/header.php';
        include 'toInclude/nav.php';
    ?>
      <div class="ranking-wrapper">
            <input placeholder="Wyszukaj gry">
            <div class="sort">
                  <p>Ocena <i class="fa-solid fa-sort-down"></i></p>
                  <p>Data premiery <i class="fa-solid fa-sort-down"></i></p>
                  <p>Platforma <i class="fa-solid fa-sort-down"></i></p>
                  <p>Rodzaj <i class="fa-solid fa-sort-down"></i></p>
            </div>
          <section class="all-games">
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
          </section>
      </div>

    <template class="ranking-wrapper" id="game-template">
        <div class="game">
            <div class="game-img">
                <img src="">
            </div>

            <div class="game-info">
                <h3></h3>
                <span>Platforma: </span>
                <p class="platform">Platforma: </p>
                <p class="datepremiere">Data premiery: </p>
                <p class="type">Rodzaj: </p>
            </div>

            <div class="game-desc">
                <p class="description"></p>
            </div>

            <div class="game-rate">
                <div class="rate">86</div>
            </div>

        </div>
    </template>

    <?php
        include 'toInclude/footer.php';
    ?>