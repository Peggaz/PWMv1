<?php
/**
 * Calculator.
 */

namespace App\Tests\Util;

/**
 * Class Calculator.
 */
class calculator_test
{
    /**
     * Add two integers.
     *
     * @param int $a First number
     * @param int $b Second number
     *
     * @return int Result
     */
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}