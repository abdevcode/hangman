<?php
include_once 'core/Application.php';
include_once 'core/Router.php';
include_once 'core/Request.php';

$app = new Application();

$app->router->get('/hangman', function (){
    require_once("app/controllers/HomeController.php");
    require_once("app/models/SuperherosModel.php");
    require_once("app/models/GameModel.php");

    $nPlayers = $_GET['n_players'] ?? 1;

    $controller = new HomeController($nPlayers);
    $controller->show();
});

$app->router->get('/hangman/game', function (){
    require_once("app/controllers/GameController.php");
    require_once("app/models/SuperherosModel.php");
    require_once("app/models/GameModel.php");

    $nPlayers = intval($_GET['n_players']) ?? 1;
    $playersName = array();

    for ($i = 1; $i <= $nPlayers; $i++) {
        $playersName[] = $_GET['player_'.$i] ?? 'Player' . $i;
    }

    $controller = new GameController($nPlayers, $playersName);
    $controller->show();
});

$app->router->get('/hangman/gameover', function (){
    require_once("app/controllers/GameOverController.php");
    require_once("app/models/SuperherosModel.php");
    require_once("app/models/GameModel.php");

    $gameResult = $_GET['game_result'] ?? 'loser';
    $superhero = $_GET['superhero'] ?? 'Not found!';
    $nPlayers = intval($_GET['n_players'] ?? 1);
    $playersName = array();

    for ($i = 1; $i <= $nPlayers; $i++) {
        $playersName[] = $_GET['player_' . $i] ?? 'Player' . $i;
    }

    $controller = new GameOverController($gameResult, $superhero, $nPlayers, $playersName);
    $controller->show();
});

$app->run();
