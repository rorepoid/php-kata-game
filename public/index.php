<?php

namespace App;

require_once('./vendor/autoload.php');

// Crear soldados
$soldier1 = new Soldier("Adán");
$soldier2 = new Soldier("Zeus");

// Present game
printf("%s vs %s \n", $soldier1->getName(), $soldier2->getName());
