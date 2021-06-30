<?php

declare(strict_types = 1);

namespace App;

use App\Attack\AttackRepository;
use App\Attack\Kick;
use App\Attack\Punch;
use App\Weapon\Leg;
use App\Weapon\WeaponRepository;

final class Soldier
{
	private string $name;
	private int $hp;
	private bool $isAlive;
	private WeaponRepository $weapon;

	public function __construct(string $name)
	{
		$this->name = $name;
		$this->isAlive = true;
		$this->hp = 15;
		$this->weapon = new Leg();
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

	public function attack(AttackRepository $attack, Soldier $soldier): void
	{
		printf(
			"%s %s %s \n",
			$this->getName(),
			$attack->getAction(),
			$soldier->getName()
		);

		$soldier->recievesAttack($attack);
	}

	private function recievesAttack(AttackRepository $attack): void
	{
		$this->hp -= $attack->getDamage();
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

	public function attacks(): array
	{
		$weaponAttacks = $this->weapon->attacks();
		$defaultAttacks = [
			new Kick(),
			new Punch(),
		];

		return array_merge($defaultAttacks, $weaponAttacks);
	}
}
