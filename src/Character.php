<?php

namespace App;

class Character {

    private $health;
    private $level;
    private $alive;
    private $MaxRange;
    private $meleeFighter;
    private $rangedFighter;
    private $maxAttackMeter;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->MaxRange = 100;
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

    public function CharacterType(string $type) : bool
    {
        if($type == 'melee') {
            $this->rangedFighter = false;
            return $this->meleeFighter = true;
        }

        if($type == 'ranged') {
            $this->meleeFighter = false;
            return $this->rangedFighter = true;
        }
    }

    public function GetMaxAttackMeters()
    {
        if($this->meleeFighter == true) {
            $this->maxAttackMeter = 2;
            return $this->maxAttackMeter;
        }

        if($this->rangedFighter == true) {
            $this->maxAttackMeter = 20;
            return $this->maxAttackMeter;
        }

        return $this->maxAttackMeter = 0;
    }

    public function GetAttackMaxRange(int $damagePoint)
    {
        $this->MaxRange = $damagePoint;
        return $this->MaxRange;
    }

    public function Attack(int $damagePoint, $character, $targertLevel) {

        $damagePoint = $this->MaxRange;

        $percentDamage = $this->CompareLevel($targertLevel);

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