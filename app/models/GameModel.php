<?php

class GameModel
{
    private $nPlayers;
    private $playersName;
    private $superhero;
    private $gameResult;

    public function __construct($nPlayers, $playersName)
    {
        $this->nPlayers = $nPlayers;
        $this->playersName = $playersName;
    }

    public function setSuperhero($superhero)
    {
        $this->superhero = $superhero;
    }

    public function setGameResult($gameResult)
    {
        $this->gameResult = $gameResult;
    }

    public function getSuperhero(){
        return $this->superhero;
    }

    public function getNPlayers()
    {
        return $this->nPlayers;
    }

    public function getPlayersName($i)
    {
        return $this->playersName[$i];
    }

    public function getGameResult()
    {
        return $this->gameResult;
    }
}