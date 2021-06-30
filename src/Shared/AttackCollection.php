<?php

declare(strict_types=1);

namespace App\Shared;

use App\Attack\AttackRepository;

final class AttackCollection
{
    private $items;

    public function __construct(AttackRepository ...$attacks)
    {
        $this->items = $attacks;
    }

    public function add(AttackRepository ...$attacks): void
    {
        $this->items = array_merge($this->items, $attacks);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function random(): AttackRepository
    {
        return $this->items[array_rand($this->items)];
    }
}
