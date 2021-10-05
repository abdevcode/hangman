<nav class="navbar navbar-light bg-danger">
    <div class="d-flex font-weight-bold navbar-brand text-white mb-0 h1">PLAYER:<div id="player-turn" class="ml-1"></div></div>

    <div>
        <span class="font-weight-bold navbar-brand text-white mb-0 h1">SUPERHEROES HANGMAN</span>
        <img src="/hangman/public/img/HeaderFace.png" width="40" alt="">
    </div>
</nav>
<div class="container">
    <div class="p-3 m-3">
        <div>
            <div class="list-inline align-bottom">
                <?php
                foreach (str_split($this->getGameModel()->getSuperhero()) as $key => $letter) {
                    if ($letter == ' ') {
                        echo "<div id='letter-$key' class='list-inline-item' style='width: 1em; height: 1.5em;'></div>";
                    } else {
                        echo "<div id='letter-$key' class='list-inline-item border-bottom border-danger text-center align-bottom' style='width: 1em; height: 1.5em;'><span style='display: none'>$letter</span></div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="border border-danger m-3 p-3">
        <span class="font-weight-bold">LETTERS FAILED:</span>
        <div id="letters-failed"></div>
    </div>
    <form id="gameover-form" action="/hangman/gameover" method="get">
        <input id="superhero" name="superhero" type="hidden" value="<?= $this->getGameModel()->getSuperhero() ?>">
        <input id="n-players" name="n_players" type="hidden" value="<?= $this->getGameModel()->getNPlayers() ?>">

        <?php for ($i = 1; $i <= $this->getGameModel()->getNPlayers(); $i++) {?>
            <input id="player-<?= $i ?>" name="player_<?= $i ?>" type="hidden" value="<?= $this->getGameModel()->getPlayersName($i-1) ?>">
        <?php } ?>
        <input id="game-result" name="game_result" type="hidden" value="">
    </form>
</div>

<script src="/hangman/public/js/game.js"></script>