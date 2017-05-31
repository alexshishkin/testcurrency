<?php


namespace Currency\Tests\Common;


use PHPUnit\Framework\TestCase;

class CommonTest extends TestCase
{
    /**
     * check that repository correctly stores values
     *
     */
    public function testRepository() {
        $object = new Loader();

        // repo launches function only for unknown names
        $object->get('test');
        $this->assertEquals(1, Loader::$counter);

        $object->get('test');
        $this->assertEquals(1, Loader::$counter);

        $object->get('test2');
        $this->assertEquals(2, Loader::$counter);

        $object->get('test');
        $this->assertEquals(2, Loader::$counter);

        // ... or if the cache must be ignored
        $object->get('test', 1);
        $this->assertEquals(3, Loader::$counter);
    }
}