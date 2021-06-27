<?php

namespace App;

require_once('./vendor/autoload.php');

// Crear soldados
$soldier1 = new Soldier("Adán");
$soldier2 = new Soldier("Zeus");

// Present game
echo printf("%s vs %s", $soldier1->getName(), $soldier2->getName());
