<?php

declare(strict_types = 1);

namespace App\Attack;

final class Kick implements AttackRepository
{
    public function getName(): string
    {
        return 'kick';
    }

    public function getDamage(): int
    {
        return 5;
    }

    public function getAction(): string
    {
        return 'kicks';
    }
}