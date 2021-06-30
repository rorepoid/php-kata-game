<?php

declare(strict_types=1);

namespace App\Weapon;

use App\Attack\AttackRepository;

interface WeaponRepository
{
    public function getName(): string;

    public function createAttack(AttackRepository $attack): AttackRepository;

    public function attacks(): array;
}
