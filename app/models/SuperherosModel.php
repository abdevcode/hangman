<?php

class SuperherosModel
{
    private $superheros;

    public function __construct()
    {
        $this->superheros = $this->loadContent();
    }
    
    public function getRandSuperhero() {
        return strtoupper($this->superheros[array_rand($this->superheros)]);
    }

    private function loadContent() {
        // Get the contents of the JSON file
        $strJsonFileContents = file_get_contents(__DIR__."/../../public/js/superheros.json");

        // Convert to array
        $array = json_decode($strJsonFileContents, true);

        return $array;
    }
}
