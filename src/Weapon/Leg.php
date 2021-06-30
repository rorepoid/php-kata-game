<?php

declare(strict_types = 1);

namespace App\Weapon;

use App\Attack\AttackRepository;
use App\Attack\Kick;

final class Leg implements WeaponRepository
{
    public function getName(): string
    {
        return "Leg";
    }

    public function createAttack(?AttackRepository $attack = null): AttackRepository
    {
        return $attack ?? new Kick();
    }
}