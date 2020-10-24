<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;

class CharacterTest extends TestCase {

	public function test_health(
	) {
		// Escenario - Given
		$ryu = new Character();
		//Accion - When
		
		// Assert - Then
		$result = $ryu->GetHealth();
		$this->assertEquals(1000, $result);
	}
	
	public function test_initial_level(
		) {
			// Escenario - Given
			$ryu = new Character();
			//Accion - When
			
			// Assert - Then
			$result = $ryu->GetLevel();
			$this->assertEquals(1, $result);
		}

	public function test_starting_alive(
		) {
			// Escenario - Given
			$ryu = new Character();
			//Accion - When
			
			// Assert - Then
			$result = $ryu->IsAlive();
			$this->assertEquals(true, $result);
		}

	public function test_give_damage_to_other(
		) {
			// Escenario - Given
			$heroe = new Character();
			$enemy = new Character();
			//Accion - When
			$heroe->currentHealth = $enemy->Attack(100);
			// Assert - Then
			$result = $heroe->GetHealth();
			$this->assertEquals(900, $result);
		}

	public function test_character_died(
		) {
			// Escenario - Given
			$heroe = new Character();
			$enemy = new Character();
			//Accion - When
			$heroe->currentHealth = $enemy->Attack(1000);
			// Assert - Then
			$result = $heroe->IsAlive();
			$this->assertEquals(false, $result);
		}
}


