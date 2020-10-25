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
		$heroeHealth = $heroe->GetHealth();
		//Accion - When
		$heroeHealth = $enemy->Attack(100, $heroe);
		// Assert - Then
		$result = $heroeHealth;
		$this->assertEquals(900, $result);
	}

	public function test_when_character_die() 
	{
		// Given
		$heroe = new Character();
		$enemy = new Character();
		$heroeHealth = $heroe->GetHealth();
		// When
		$heroeHealth = $enemy->Attack(1000, $heroe);
		// Asserts
		$result = $heroe->IsAlive($heroeHealth);
		$this->assertEquals(false, $result);

	}

	public function test_healing_a_character()
	{
		// Given
		$gandalf = new Character();
		$frodo = new Character();
		$frodoHealth = $frodo->GetHealth();
		$frodoHealth = 900;
		// Action
		$frodoHealth = $gandalf->ToHeal(100,$frodoHealth);
		// Asserts
		$result = $frodoHealth;
		$this->assertEquals(1000, $result);
	}

	public function test_dead_pj_cannot_healed()
	{
		// Given
		$gandalf = new Character();
		$frodo = new Character();
		$frodoHealth = $frodo->GetHealth();
		$frodoHealth = 0;
		// Action - When
		$frodoHealth = $gandalf->ToHeal(100, $frodoHealth);
		// Asserts
		$result = $frodoHealth;
		$this->assertEquals(0, $result);
	}

	public function test_not_raise_heath_above_1000()
	{
		// Given
		$gandalf = new Character();
		$frodo = new Character();
		$frodoHealth = $frodo->GetHealth();
		// Action - When
		$frodoHealth = $gandalf->ToHeal(100, $frodoHealth);
		// Assert
		$result = $frodoHealth;
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

	
}


