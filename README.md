# Mars Rover Control System

This project implements a control system for robotic rovers deployed on Mars. The system receives input about the Mars plateau's dimensions and the initial positions and instructions for multiple rovers. It then navigates the rovers on the plateau according to the given instructions and outputs their final positions.

## Problem Description

A squad of robotic rovers is to be landed by NASA on a plateau on Mars. The plateau, which is curiously rectangular, must be navigated by the rovers so that their onboard cameras can get a complete view of the surrounding terrain to send back to Earth.

A rover's position is represented by a combination of x and y coordinates and a letter representing one of the four cardinal compass points. The plateau is divided up into a grid to simplify navigation. An example position might be 0, 0, N, which means the rover is in the bottom-left corner and facing North.

In order to control a rover, NASA sends a simple string of letters. The possible letters are L, R, and M. L and R make the rover spin 90 degrees left or right, respectively, without moving from its current spot.

M means move forward one grid point and maintain the same heading.

## Input

The input consists of several lines:

- The first line contains two integers separated by a space, representing the upper-right coordinates of the plateau. The lower-left coordinates are assumed to be 0, 0.

- Subsequent lines describe the initial position and movement instructions for each rover. Each rover's information is provided in two lines:
    - The first line contains three elements separated by spaces: the x and y coordinates of the rover's initial position and its orientation (N, S, E, W).
    - The second line contains a string of letters representing the movement instructions for the rover.

Example Input:
5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM

## Output

The output consists of one line for each rover, containing its final position and orientation.

Example Output:
1 3 N
5 1 E

## Installation

To use the Mars Rover Control System, follow these steps:

1. Clone the repository to your local machine:
   git clone <repository_URL>
2. Navigate to the project directory:
   cd mars_rover
3. Install dependencies using Composer:
   composer install

## Usage
1. Modify the `main.php` file to include your script logic using the `Movement` class.
2. Replace `input.php` with your input file containing plateau dimensions and rover instructions.
3. Run your script:
   php main.php

## Tests
1. Tests for the `Movement` class are located in the `tests` directory.
2. Run PHPUnit tests:
   php vendor/bin/phpunit tests