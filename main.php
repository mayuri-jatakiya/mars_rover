<?php

require_once 'src/Rover.php';
require_once 'src/Plateau.php';
require_once 'src/Movement.php';
require_once 'input.php';

use Mars\Movement;

$input = getInput(); // Get input using the function from input.php

try {
    $movement = new Movement();
    $output = $movement->executeInstructions($input);

    // Print each rover position on a new line
    foreach ($output as $position) {
        echo $position . PHP_EOL;
    }
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
