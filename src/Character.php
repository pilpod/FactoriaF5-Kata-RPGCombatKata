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

    public function IsAlive(int $health) : bool {
        if($health <= 0) {
            $this->alive = false;
            return $this->alive;
        }

        return $this->alive;
    }

    public function Attack(int $damagePoint, $character) {
        if($this !== $character) {
            $this->health -= $damagePoint;
            return $this->health;
        }
        return $this->health;
    }

    public function ToHeal(int $healPoint, int $heathCharacter) {
        if($heathCharacter <= 0) {
            return $heathCharacter;
        }

        if($heathCharacter == 1000) {
            return $heathCharacter;
        }

        $heathCharacter += $healPoint;
        $this->health = $heathCharacter;
        return $this->health;
    }
    
}

?>