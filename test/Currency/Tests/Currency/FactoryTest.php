<?php


namespace Currency\Tests\Currency;


use Currency\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testList() {
        $f = new Factory();
        $data = $f->getList();

        $this->assertTrue(is_array($data));
        $this->assertTrue(isset($data['AED']));
    }
}