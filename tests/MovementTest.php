<?php

namespace tests\mars_rover\tests;

use PHPUnit\Framework\TestCase;
use Mars\Movement;

class RoverMovementTest extends TestCase
{

    //Test the scenario given in practical example.
    public function testExecuteInstructions() {

        $movement = new Movement();

        // Test input string
        $input = "5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM";

        // Expected output string
        $expectedOutput = ['1 3 N', '5 1 E'];

        // Execute the instructions
        $output = $movement->executeInstructions($input);

        // Assert that the output matches the expected output
        $this->assertEquals($expectedOutput, $output);
    }


    //Test the scenario for single rover in rectangle plateau.
    public function testSingleRoverInstructions() {

        $movement = new Movement();

        // Test input string
        $input = "8 4\n2 2 N\nRMMM";

        // Expected output string
        $expectedOutput = ['5 2 E'];

        // Execute the instructions
        $output = $movement->executeInstructions($input);

        // Assert that the output matches the expected output
        $this->assertEquals($expectedOutput, $output);
    }


    //Test the scenario for two rovers in square plateau.
    public function testTwoRoverInstructions() {

        $movement = new Movement();

        // Test input string
        $input = "7 7\n4 3 S\nLMLMLLM\n5 3 E\nRMMRMM";

        // Expected output string
        $expectedOutput = ['5 3 S','3 1 W'];

        // Execute the instructions
        $output = $movement->executeInstructions($input);

        // Assert that the output matches the expected output
        $this->assertEquals($expectedOutput, $output);
    }


    //Test the scenario for three rovers in rectangle plateau.
    public function testThreeRoverInstructions() {

        $movement = new Movement();

        // Test input string
        $input = "6 8\n2 4 W\nLMLMMM\n3 4 N\nMMRMM\n5 3 S\nMMRRM";

        // Expected output string
        $expectedOutput = ['5 3 E','5 6 E','5 2 N'];

        // Execute the instructions
        $output = $movement->executeInstructions($input);

        // Assert that the output matches the expected output
        $this->assertEquals($expectedOutput, $output);
    }


    //Test the scenario when rover is instructed to go out of grid.
    public function testRoverOutOfGrid() {

        $movement = new Movement();

        // Test input string
        $input = "5 5\n5 5 N\nMMML";

        // Expected exception
        $expectedException = \InvalidArgumentException::class;

        // Execute the instructions and expect an exception
        $this->expectException($expectedException);

        // Execute the instructions
        $output = $movement->executeInstructions($input);
    }


    //Test the scenario when rover is instructed invalid direction that is other than R and L.
    public function testRoverInvalidDirection() {

        $movement = new Movement();

        // Test input string
        $input = "5 5\n1 1 N\nMAMB";

        // Expected exception
        $expectedException = \InvalidArgumentException::class;

        // Execute the instructions and expect an exception
        $this->expectException($expectedException);

        // Execute the instructions
        $output = $movement->executeInstructions($input);
    }

    //Test the scenario when rover is given invalid input for move that is other than M.
    public function testRoverInvalidMove() {

        $movement = new Movement();

        // Test input string
        $input = "5 5\n1 1 N\nMLCR";

        // Expected exception
        $expectedException = \InvalidArgumentException::class;

        // Execute the instructions and expect an exception
        $this->expectException($expectedException);

        // Execute the instructions
        $output = $movement->executeInstructions($input);
    }

    //Test the scenario when rover is given invalid input with extra spaces.
    public function testRoverInvalidSpace() {

        $movement = new Movement();

        // Test input string
        $input = "5 5\n1  1 N\nM LM";

        // Expected exception
        $expectedException = \InvalidArgumentException::class;

        // Execute the instructions and expect an exception
        $this->expectException($expectedException);

        // Execute the instructions
        $output = $movement->executeInstructions($input);
    }

    //Test the scenario when rover is given invalid input with no spaces.
    public function testRoverNoSpace() {

        $movement = new Movement();

        // Test input string
        $input = "55\n11N\nMLM";

        // Expected exception
        $expectedException = \InvalidArgumentException::class;

        // Execute the instructions and expect an exception
        $this->expectException($expectedException);

        // Execute the instructions
        $output = $movement->executeInstructions($input);
    }

    //Test the scenario when rover conflicts.
    public function testRoverConflicts()
    {
        $movement = new Movement();

        // Test input string with conflicting rovers
        $input = "5 5\n1 2 N\nMMML\n1 4 N\nML";

        // Expected exception
        $expectedException = \InvalidArgumentException::class;

        // Expect a RuntimeException due to rover conflicts
        $this->expectException($expectedException);

        // Execute the instructions
        $movement->executeInstructions($input);
    }

    //Test the scenario for rover input case sensitive.
    public function testRoverInputCaseSensitive() {

        $movement = new Movement();

        // Test input string
        $input = "7 7\n4 3 s\nlmlmllm\n5 3 E\nrmmrmm";

        // Expected output string
        $expectedOutput = ['5 3 S','3 1 W'];

        // Execute the instructions
        $output = $movement->executeInstructions($input);

        // Assert that the output matches the expected output
        $this->assertEquals($expectedOutput, $output);
    }

}
