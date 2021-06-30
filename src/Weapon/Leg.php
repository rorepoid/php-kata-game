<?php

declare(strict_types=1);

namespace App\Weapon;

use App\Attack\AttackRepository;
use App\Attack\DivineAxe;

final class Leg implements WeaponRepository
{
    public function getName(): string
    {
        return "Leg";
    }

    public function createAttack(AttackRepository $attack): AttackRepository
    {
        return $attack;
    }

    public function attacks(): array
    {
        return [
            new DivineAxe(),
        ];
    }
}
