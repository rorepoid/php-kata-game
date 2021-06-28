<?php

namespace App;

final class Soldier
{
	private $name;
	private $health;

	public function __construct(string $name)
	{
		$this->name = $name;
		$this->isAlive = true;
		$this->health = 10;
	}

	public function getName()
	{
		return $this->name;
	}

	public function attack(Soldier $soldier)
	{
		printf("\n%s attacks %s \n", $this->name, $soldier->name);
		$soldier->recievesAttack();
	}

	private function recievesAttack()
	{
		printf("%s received attack \n", $this->name);

		$this->health -= 5;

		printf("%s health is now %s \n", $this->name, $this->health);

		if ($this->health <= 0) {
			$this->die();
		}
	}

	private function die()
	{
		printf("%s died \n", $this->name);
		$this->isAlive = false;
	}

	public function isAlive()
	{
		return $this->health > 0;
	}
}
