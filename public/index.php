<?php

namespace App;

require_once('./vendor/autoload.php');

// Crear soldados
$soldier1 = Soldier::create("Adán");
$soldier2 = Soldier::create("Zeus");

// Present game
printf("%s vs %s \n", $soldier1->getName(), $soldier2->getName());

// Start game
while (true) {
    $soldier1->attack($soldier2);
    if (!$soldier1->isAlive() || !$soldier2->isAlive()) {
        break;
    }
    $soldier2->attack($soldier1);
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