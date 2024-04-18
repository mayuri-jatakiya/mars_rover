<?php

namespace Mars;

class Plateau
{
    private int $maxX;
    private int $maxY;

    public function __construct(int $maxX, int $maxY)
    {
        if ($maxX < 0 || $maxY < 0) {
            throw new \InvalidArgumentException("Plateau coordinates cannot be negative");
        }

        $this->maxX = $maxX;
        $this->maxY = $maxY;
    }

    public function getMaxX(): int
    {
        return $this->maxX;
    }

    public function getMaxY(): int
    {
        return $this->maxY;
    }

    public function isValidPosition(int $x, int $y): bool
    {
        return $x >= 0 && $x <= $this->maxX && $y >= 0 && $y <= $this->maxY;
    }
}