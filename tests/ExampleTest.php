<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;

class ExampleTest extends TestCase {

	public function test_example(
	) {
		$character = new Character();
		$result = $character->health;
		$this->assertEquals(1, $result);
	}

}


