<?php

declare(strict_types=1);

namespace App\Attack;

interface AttackRepository
{
    public function getDamage(): int;

    /**
     * Get the action as Transitive verb
     */
    public function getAction(): string;
}
