<?php


namespace Currency\Tests\Currency;


use Currency\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testList() {
        $calc = new Calculator('AFN', 'AMD');
        $result = $calc->convert(100);

        $this->assertEquals('27673.975864', $result);
    }
}