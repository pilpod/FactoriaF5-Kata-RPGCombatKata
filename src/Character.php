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
        if($this->health <= 0) {
            $this->alive = false;
            return $this->alive;  
        }
        return $this->health;
    }

    public function CheckIsAlive() {
        return $this->alive;
    }

    public function Attack(int $damagePoint, $character) {
        if($this !== $character) {
            $character->health -= $damagePoint;
        }
    }

    public function ToHeal(int $healPoint, $character) {
        if($character->alive == false) {
            return;
        }

        if($character->health + $healPoint >= 1000) {
            $character->health == 1000;
            return;
        }

        $character->health += $healPoint;
        
    }
    
}

?>