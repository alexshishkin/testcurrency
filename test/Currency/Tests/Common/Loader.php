<?php


namespace Currency\Tests\Common;


use Common\Repository;

class Loader extends Repository
{
    // counts times the lambda was used
    public static $counter = 0;

    public function get($name, $is_ignore_cache = 0) {
        return parent::getObject($name, function() {
            Loader::$counter++;
            return time();
        }, $is_ignore_cache);
    }
}