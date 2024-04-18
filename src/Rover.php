<?php

namespace Mars;

class Rover {

    private int $x;
    private int $y;
    private string $orientation;

    public function __construct(int $x, int $y, string $orientation)
    {
        if (!in_array($orientation, ['N', 'E', 'S', 'W'])) {
            throw new \InvalidArgumentException("Invalid orientation: $orientation");
        }

        $this->x = $x;
        $this->y = $y;
        $this->orientation = $orientation;
    }

    public function getPosition(): string {
        return "$this->x, $this->y, $this->orientation";
    }

    public function turnLeft(): void {
        try {
            $this->orientation = match ($this->orientation) {
                'N' => 'W',
                'E' => 'N',
                'S' => 'E',
                'W' => 'S',
                default => throw new \InvalidArgumentException("Invalid orientation: $this->orientation")
            };
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }

    public function turnRight(): void {
        try {
            $this->orientation = match ($this->orientation) {
                'N' => 'E',
                'E' => 'S',
                'S' => 'W',
                'W' => 'N',
                default => throw new \InvalidArgumentException("Invalid orientation: $this->orientation")
            };
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }

    public function move(Plateau $plateau): void {
        // Store the new coordinates in temporary variables
        $newX = $this->x;
        $newY = $this->y;

        // Update the coordinates based on the orientation
        match ($this->orientation) {
            'N' => $newY++,
            'E' => $newX++,
            'S' => $newY--,
            'W' => $newX--,
            default => throw new \InvalidArgumentException("Invalid orientation: $this->orientation")
        };

        // Check if the new position is within the plateau boundaries
        if ($newX >= 0 && $newX <= $plateau->getMaxX() && $newY >= 0 && $newY <= $plateau->getMaxY()) {
            // Update the rover's position
            $this->x = $newX;
            $this->y = $newY;
        } else {
            // Optionally, throw an exception or handle the case where the new position is outside the plateau boundaries
            throw new \InvalidArgumentException("New position is outside the plateau boundaries");
        }
    }

}