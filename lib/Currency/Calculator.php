<?php

namespace Currency;


class Calculator
{
    /** @var  CurrencyVO */
    private $from;
    /** @var  CurrencyVO */
    private $to;

    public function __construct($from, $to)
    {
        $factory = new Factory();
        $this->from = $factory->getByCode($from);
        $this->to = $factory->getByCode($to);
    }

    public function convert($value) {
        $this->from->value = $value;
        $factory = new Factory();
        return $factory->getDataLoader()->getConvertValue($this->from, $this->to);
    }
}