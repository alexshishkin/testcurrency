<?php
namespace Common;

class DataLoader extends Repository
{
    protected function get($url, $is_ignore_cache = 0) {
        return parent::getObject($url, function() use ($url) {
            return json_decode(file_get_contents($url), 1);
        }, $is_ignore_cache);
    }
}