<?php

namespace App;

class Character {

    private $health;
    private $level;
    private $alive;
    public $currentHealth;
    public $damagePoint;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->damagePoint = 100;
        $this->currentHealth = $this->health;
    }

    public function GetHealth() : int {
        if($this->health != $this->currentHealth) {
            return $this->currentHealth;
        }

        return $this->health;
    }

    public function GetLevel() : int {
        return $this->level;
    }

    public function IsAlive() : bool {
        return $this->alive;
    }

    public function Attack($damagePoint) {
        $this->health -= $damagePoint;
        $this->currentHealth = $this->health;
        return $this->currentHealth;
    }
    
}

?>