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

    public function Attack(int $damagePoint, $character, $level) {

        $percentDamage = $this->CompareLevel($level);

        if($this !== $character) {
            $character->health -= $damagePoint * $percentDamage;
        }

    }

    public function ToHeal(int $healPoint, $character) {
        
        if($this !== $character) {
            return;
        }
        
        if($character->alive == false) {
            return;
        }

        if($character->health + $healPoint >= 1000) {
            $character->health = 1000;
            return;
        }

        $character->health += $healPoint;
    }

    public function CompareLevel($levelCharacter) 
    {
        $difference = $levelCharacter - $this->level;
        $difference = abs($difference);
        
        if($levelCharacter > $this->level && $difference >= 5) {
            return 0.50;
        }

        if($levelCharacter < $this->level && $difference >= 5) {
            return 1.50;
        }

        return 1;
    }
    
}

?>