<?php

namespace App;

use App\Attack\AttackRepository;

require_once('./vendor/autoload.php');

// Create soldiers
$soldier1 = Soldier::create("Adam");
$soldier2 = Soldier::create("Zeus");

// Present game
printf("%s vs %s \n", $soldier1->getName(), $soldier2->getName());

// Start game
while (true) {
    echo "\n";

    $soldier1->attack(randomAttack($soldier1), $soldier2);

    if (!$soldier1->isAlive() || !$soldier2->isAlive()) {
        break;
    }
    echo "\n";

    $soldier2->attack(randomAttack($soldier2), $soldier1);

    if (!$soldier1->isAlive() || !$soldier2->isAlive()) {
        break;
    }
}

if ($soldier1->isAlive()) {
    $killerSoldier = $soldier1;
    $deadSoldier = $soldier2;
} else {
    $killerSoldier = $soldier2;
    $deadSoldier = $soldier1;
}

printf("\n%s has been killed by %s \n", $deadSoldier->getName(), $killerSoldier->getName());
printf("Game is over, %s wins\n", $killerSoldier->getName());

function randomAttack(Soldier $soldier): AttackRepository
{
    $randomAttackIndex = array_rand($soldier->attacks());
    return $soldier->attacks()[$randomAttackIndex];
}