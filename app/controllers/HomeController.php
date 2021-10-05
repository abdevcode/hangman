<?php

class HomeController
{
    private $gameModel;

    public function __construct($nPlayers)
    {
        $this->gameModel = new GameModel($nPlayers, array());
    }

    public function show()
    {
        $this->renederView();
    }

    public function getGameModel()
    {
        return $this->gameModel;
    }

    private function renederView()
    {
        include_once __DIR__ . '/../views/templates/header.php';
        include_once __DIR__ . '/../views/HomeView.php';
        include_once __DIR__ . '/../views/templates/footer.php';
    }
}