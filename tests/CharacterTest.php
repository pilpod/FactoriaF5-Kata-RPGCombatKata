<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;

class CharacterTest extends TestCase {

	public function test_health() 
	{
		// Escenario - Given
		$ryu = new Character();
		//Accion - When
		
		// Assert - Then
		$result = $ryu->GetHealth();
		$this->assertEquals(1000, $result);
	}
	
	public function test_initial_level() 
	{
		// Escenario - Given
		$ryu = new Character();
		//Accion - When
		
		// Assert - Then
		$result = $ryu->GetLevel();
		$this->assertEquals(1, $result);
	}

	public function test_starting_alive() 
	{
		// Escenario - Given
		$ryu = new Character();
		//Accion - When
		
		// Assert - Then
		$result = $ryu->IsAlive(1000);
		$this->assertEquals(true, $result);
	}

	public function test_give_damage_to_other() 
	{
		// Escenario - Given
		$heroe = new Character();
		$enemy = new Character();
		//Accion - When
		$enemy->Attack(100, $heroe, $heroe->GetLevel());
		// Assert - Then
		$result = $heroe->GetHealth();
		$this->assertEquals(900, $result);
	}

	public function test_when_character_die() 
	{
		// Given
		$heroe = new Character();
		$enemy = new Character();
		// When
		$enemy->Attack(1000, $heroe, $heroe->GetLevel());
		// Asserts
		$result = $heroe->IsAlive();
		$this->assertEquals(false, $result);

	}

	public function test_healing_a_character()
	{
		// Given
		$gandalf = new Character();
		$frodo = new Character();
		$orco = new Character();
		$AttackMaxRange = $orco->GetAttackAttackMaxRange(100);
		// Action
		$orco->Attack(100, $frodo, $frodo->GetLevel());
		$gandalf->ToHeal(100, $frodo);
		// Asserts
		$result = $frodo->GetHealth();
		$this->assertEquals(900, $result);
	}

	public function test_dead_pj_cannot_healed()
	{
		// Given
		$gandalf = new Character();
		$frodo = new Character();
		// Action - When
		$gandalf->Attack(1000, $frodo, $frodo->GetLevel());
		// Asserts
		$result1 = $frodo->IsAlive();
		$result2 = $gandalf->ToHeal(100, $frodo);
		$this->assertEquals(false, $result1);
		$this->assertEquals(null, $result2);
	}

	public function test_not_raise_health_above_1000()
	{
		// Given
		$gandalf = new Character();
		$frodo = new Character();
		$ogre = new Character();
		// Action - When
		$ogre->Attack(200, $frodo, $frodo->GetLevel());
		$ogre->Attack(100, $gandalf, $gandalf->GetLevel());
		$gandalf->ToHeal(300, $gandalf);
		// Assert
		$result = $gandalf->GetHealth(); 
		$this->assertEquals(1000, $result);

		
	}

	public function test_cannot_deal_damage_itself()
	{
		// Given
		$ryu = new Character();
		// Action
		$ryu->Attack(100, $ryu, $ryu->GetLevel());
		// Assert
		$result =  $ryu->GetHealth();
		$this->assertEquals(1000, $result);
	}

	public function test_can_only_heal_itself() 
	{
		$gandalf = new Character();
		$frodo = new Character();
		$ogre = new Character();

		$ogre->Attack(100, $frodo, $frodo->GetLevel());
		$ogre->Attack(100, $gandalf, $gandalf->GetLevel());
		$gandalf->ToHeal(100, $frodo);
		$gandalf->ToHeal(100, $gandalf);

		$resultOther = $frodo->GetHealth();
		$resultItself = $gandalf->GetHealth();
		$this->assertEquals(900, $resultOther);
		$this->assertEquals(1000, $resultItself);
	}

	public function test_5_or_more_levels_above_damage_reduced()
	{
        $aragorn = new Character();
        $ogre = new Character();

        $ogre->Attack(100, $aragorn, 6);

        $result = $aragorn->GetHealth();
        $this->assertEquals(950, $result);
    }
	
	public function test_5_or_more_levels_below_damage_increased()
	{
		$aragorn = new Character();
		$ogre = new Character();

		$ogre->Attack(100, $aragorn, -6);

		$result = $aragorn->GetHealth();
		$this->assertEquals(850, $result);
	}

	public function test_characters_have_attack_max_range()
	{
		$aragorn = new Character();

		$result = $aragorn->GetAttackAttackMaxRange();
		$this->assertEquals(100, $result);
	}

	public function test_melee_fighters_have_attack_range_2_meters()
	{
		$aragorn = new Character();
		$aragorn->CharacterType('melee');
		
		$result = $aragorn->GetAttackAttackMaxRange();
		$this->assertEquals(2, $result);
	}

	public function test_ranged_fighters_have_attack_range_20_meters()
	{
		$legolas = new Character();
		$legolas->CharacterType('ranged');

		$result = $legolas->GetAttackAttackMaxRange();
		$this->assertEquals(20, $result);
	}
	
	public function test_meleeFighter_in_range_to_deal_damage()
	{
		$aragorn = new Character();
		$aragorn->CharacterType('melee');
		$aragorn->GetAttackAttackMaxRange();
		$ogre = new Character();

		$aragorn->Attack(100, $ogre, 1);



	}
}


