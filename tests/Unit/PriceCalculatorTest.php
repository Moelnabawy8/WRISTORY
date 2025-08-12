<?php

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use App\Services\PriceCalculator;

class PriceCalculatorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    // tests/Unit/PriceCalculatorTest.php
public function test_it_calculates_discount_correctly()
{
    $calc = new PriceCalculator();
    $this->assertEquals(80, $calc->calculate(100, 20));
}

}
