<nav class="navbar navbar-light bg-danger d-flex justify-content-center">
    <div>
        <span class="font-weight-bold navbar-brand text-white mb-0 h1">SUPERHEROES HANGMAN</span>
        <img src="/hangman/public/img/HeaderFace.png" width="40" alt="">
    </div>
</nav>
<div class="container d-flex justify-content-center">

    <div class="d-block justify-content-center">

        <?php if ($this->getGameModel()->getGameResult() === 'loser') { ?>
        <div class="d-block">
            <div class="font-weight-bold text-danger mb-0 h3">LOSER</div>
            <img src="/hangman/public/img/AngryHulk.png" width="100" alt="">
        </div>
        <?php } else { ?>
        <div class="d-block">
            <div class="font-weight-bold text-danger mb-0 h3">WINNER</div>
            <img src="/hangman/public/img/HappyHulk.png" width="100" alt="">
        </div>
        <?php } ?>

        <span class="font-weight-bold m-2 h3">SUPERHERO: <?= $this->getGameModel()->getSuperhero() ?></span>

        <div class="d-flex justify-content-center mt-5">
            <form action="/hangman/game" method="get">
                <input id="n-players" name="n_players" type="hidden" value="<?= $this->getGameModel()->getNPlayers() ?>">

                <?php for ($i = 1; $i <= $this->getGameModel()->getNPlayers(); $i++) {?>
                    <input id="player-<?= $i ?>" name="player_<?= $i ?>" type="hidden" value="<?= $this->getGameModel()->getPlayersName($i-1) ?>">
                <?php } ?>

                <button type="submit" class="btn btn-danger mr-2">PLAY AGAIN</button>
            </form>

            <form action="/hangman/" method="get">
                <input id="n-players" name="n_players" type="hidden" value="<?= $this->getGameModel()->getNPlayers() ?>">

                <button type="submit" class="btn btn-danger">NEW GAME</button>
            </form>
        </div>
    </div>
</div>
