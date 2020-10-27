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
		$enemy->Attack(100, $heroe);
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
		$enemy->Attack(1000, $heroe);
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
		// Action
		$orco->Attack(200, $frodo);
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
		$gandalf->Attack(1100, $frodo);
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
		$ogre->Attack(200, $frodo);
		$gandalf->ToHeal(300, $frodo);
		// Assert
		$result = $frodo->GetHealth(); 
		$this->assertEquals(1000, $result);

		
	}

	public function test_cannot_deal_damage_itself()
	{
		// Given
		$ryu = new Character();
		$ryufHealth = $ryu->GetHealth();
		// Action
		$ryufHealth = $ryu->Attack(100, $ryu);
		// Assert
		$result =  $ryufHealth;
		$this->assertEquals(1000, $result);
	}

	// public function test_can_only_heal_itself() 
	// {
	// 	// Given - Stage
	// 	// $gandalf = new Character();
	// 	// $gandalfHealth = $gandalf->GetHealth();
	// }

	
}


