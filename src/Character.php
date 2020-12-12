<?php

namespace App;

class Character {

    private $health;
    private $level;
    private $alive;
    private $AttackMaxRange;
    private $meleeFighter;
    private $rangedFighter;
    private $distance;
    private $metersToEnemy;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->AttackMaxRange = 100;
        $this->metersToEnemy = 0;
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

    public function SetDistance($characterMeters)
    {
        $this->distance = $characterMeters;
    }

    public function GetDistance()
    {
        return $this->distance;
    }

    public function DistanceWithEnemy($enemyMeters)
    {
        $this->metersToEnemy = $enemyMeters - $this->distance;
    }

    public function GetMetersToEnemy()
    {
        return $this->metersToEnemy;
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

    public function GetAttackMaxRange()
    {
        if($this->meleeFighter == true) {
            $this->AttackMaxRange = 2;
            return $this->AttackMaxRange;
        }

        if($this->rangedFighter == true) {
            $this->AttackMaxRange = 20;
            return $this->AttackMaxRange;
        }

        if($this->meleeFighter == false && $this->rangedFighter == false) {
            return $this->AttackMaxRange;
        }
    }

    public function Attack(int $damagePoint, $character, $targertLevel) {

        $percentDamage = $this->CompareLevel($targertLevel);
        $metersToEnemy = $this->GetMetersToEnemy();

        if($this->meleeFighter == true && $metersToEnemy <= 2) {
            $this->ExtractHealth($character, $damagePoint, $percentDamage);
        }

        if($this->rangedFighter == true && $metersToEnemy <= 20) {
            $this->ExtractHealth($character, $damagePoint, $percentDamage);
        }

        if($this->meleeFighter == false && $this->rangedFighter == false) {
            $this->ExtractHealth($character, $damagePoint, $percentDamage);
        }

    }

    public function ExtractHealth($character, $damagePoint, $percentDamage)
    {
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