<nav class="navbar navbar-light bg-danger d-flex justify-content-center">
    <div class="font-weight-bold navbar-brand text-white mb-0 display-1">SUPERHEROES HANGMAN</div>
</nav>

<div class="container">
    <div>
        <div class="overflow-hidden">
            <div class="container px-5">
                <img src="/hangman/public/img/HomeFaces.png" class="img-fluid" alt="Example image" width="250" loading="lazy">
            </div>

        </div>
        <div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">N PLAYERS</label>
                <div class="col-sm-5">
                    <form id="n_players_form" action="/hangman/" method="get">
                        <input id="n_players" name="n_players" type="number" class="form-control" value="<?= $this->getGameModel()->getNPlayers() ?>">
                    </form>
                </div>
            </div>
        </div>
        <form action="/hangman/game" method="get">
            <input name="n_players" type="hidden" value="<?= $this->getGameModel()->getNPlayers() ?>">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">PLAYERS NAME</label>
                <div id="players-name" class="col-sm-5">
                    <?php for ($i = 1; $i <= $this->getGameModel()->getNPlayers(); $i++) {?>
                    <input id="player-<?= $i ?>" name="player_<?= $i ?>" type="text" class="form-control">
                    <?php } ?>
                </div>
            </div>

            <button id="start-button" type="submit" class="btn btn-primary mb-2">START GAME</button>
        </form>
    </div>
</div>
<script>
    $( document ).ready(function () {
        $('#n_players').change(function() {
            $('#n_players_form').submit();
        });
    })
</script>