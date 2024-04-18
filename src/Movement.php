<?php

namespace Mars;

class Movement
{
    private array $output = [];

    public function __construct(){ }

    public function executeInstructions(string $input): array
    {
        $lines = explode("\n", $input);

        if (count($lines) < 3 || count($lines) % 2 !== 1) {
            throw new \InvalidArgumentException("Invalid input format");
        }

        $plateauCoordinates = explode(" ", $lines[0]);
        if (count($plateauCoordinates) !== 2) {
            throw new \InvalidArgumentException("Invalid plateau coordinates");
        }

        $plateau = new Plateau((int)$plateauCoordinates[0], (int)$plateauCoordinates[1]);

        for ($i = 1; $i < count($lines); $i += 2) {
            $roverPosition = explode(" ", $lines[$i]);
            if (count($roverPosition) !== 3) {
                throw new \InvalidArgumentException("Invalid rover position");
            }

            [$x, $y, $orientation] = $roverPosition;
            if (!$plateau->isValidPosition($x, $y)) {
                throw new \InvalidArgumentException("Rover position is outside the plateau");
            }

            $instructions = trim($lines[$i + 1]);

            $rover = new Rover((int)$x, (int)$y, $orientation);
            foreach (str_split($instructions) as $instruction) {
                if (!in_array($instruction, ['L', 'R', 'M'])) {
                    throw new \InvalidArgumentException("Invalid instruction: $instruction");
                }

                match ($instruction) {
                    'L' => $rover->turnLeft(),
                    'R' => $rover->turnRight(),
                    'M' => $rover->move($plateau),
                };
            }
            $this->output[] = implode('', explode(',', $rover->getPosition()));
        }

        return $this->output;
    }
}