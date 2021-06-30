<?php

declare(strict_types = 1);

namespace App;

final class Soldier
{
	private string $name;
	private int $hp;
	private int $attack;

	public function __construct(string $name)
	{
		$this->name = $name;
		$this->isAlive = true;
		$this->hp = 10;
		$this->attack = 5;
	}

	public static function create(string $name): Soldier
	{
		$soldier = new self($name);
		printf("%s joins the battle \n", $soldier->getName());

		return $soldier;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function attack(Soldier $soldier): void
	{
		printf("%s attacks %s \n", $this->getName(), $soldier->getName());
		$soldier->recievesAttack($this->attack);
	}

	private function recievesAttack(int $attack): void
	{
		$this->hp -= $attack;
		printf("%s received attack \n", $this->name);
		printf("%s HP is now %s \n", $this->name, $this->hp);

		if (!$this->isAlive()) {
			$this->die();
		}
	}

	private function die(): void
	{
		$this->isAlive = false;
		printf("%s died \n", $this->name);
	}

	public function isAlive(): bool
	{
		return $this->hp > 0;
	}
}
