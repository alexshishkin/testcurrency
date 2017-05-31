<?php

namespace Common;


abstract class Repository
{
    protected $cache;

    protected function getObject($name, $function, $is_ignore_cache = 0) {
        if (empty($this->cache[$name]) || $is_ignore_cache) {
            $this->cache[$name] = $function();
        }
        return $this->cache[$name];
    }
}