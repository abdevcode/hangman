<?php

class GameOverController
{
    public $gameModel;

    public function __construct($gameResult, $superhero, $nPlayers, $playersName)
    {
        $this->gameModel = new GameModel($nPlayers, $playersName);
        $this->gameModel->setSuperhero($superhero);
        $this->gameModel->setGameResult($gameResult);
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
        include_once __DIR__ . '/../views/GameOverView.php';
        include_once __DIR__ . '/../views/templates/footer.php';
    }
}