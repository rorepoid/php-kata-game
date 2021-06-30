<?php

namespace App;

use App\Weapon\Leg;

require_once('./vendor/autoload.php');

// Create soldiers
$soldier1 = Soldier::create("Adam");
$soldier2 = Soldier::create("Zeus");

$soldier2->setWeapon(new Leg());

// Present game
printf("%s vs %s \n", $soldier1->getName(), $soldier2->getName());

// Start game
while (true) {
    echo "\n";

    $soldier1->attack($soldier1->attacks()->random(), $soldier2);

    if (!$soldier1->isAlive() || !$soldier2->isAlive()) {
        break;
    }
    echo "\n";

    $soldier2->attack($soldier2->attacks()->random(), $soldier1);

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
