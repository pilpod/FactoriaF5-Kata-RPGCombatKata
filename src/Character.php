<?php

namespace App;

class Character {

    private $health;
    private $level;
    private $alive;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
    }

    public function GetHealth() : int {
        return $this->health;
    }

    public function GetLevel() : int {
        return $this->level;
    }

    public function IsAlive() : bool {
        return $this->alive;
    }

}

?>