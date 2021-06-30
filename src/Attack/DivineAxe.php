<?php

declare(strict_types=1);

namespace App\Attack;

final class DivineAxe implements AttackRepository
{
    public function getDamage(): int
    {
        return 8;
    }

    public function getAction(): string
    {
        return 'throws a Meteor Jab against';
    }
}
