<?php

declare(strict_types = 1);

namespace App\Attack;

final class Fist implements AttackRepository
{
    public function getName(): string
    {
        return 'fist';
    }

    public function getDamage(): int
    {
        return 7;
    }

    public function getAction(): string
    {
        return 'hits';
    }
}