<?php

class GameController {
    private $gameModel;
    private $superherosModel;

    public function __construct($nPlayers, $playersName)
    {
        $this->gameModel = new GameModel($nPlayers, $playersName);
        $this->superherosModel = new SuperherosModel();
    }

    public function show()
    {
        // Generar un nuevo superheroe
        $superhero = $this->superherosModel->getRandSuperhero();
        $this->gameModel->setSuperhero($superhero);

        $this->renederView();
    }

    public function getGameModel()
    {
        return $this->gameModel;
    }

    private function renederView()
    {
        include_once __DIR__ . '/../views/templates/header.php';
        include_once __DIR__ . '/../views/GameView.php';
        include_once __DIR__ . '/../views/templates/footer.php';
    }
}