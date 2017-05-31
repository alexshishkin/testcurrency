<?php


namespace Currency\Loader;


use Currency\CurrencyVO;

interface CurrencyLoaderInterface
{
    /**
     * @return mixed
     */
    public function getCurrencies();

    /**
     * @param CurrencyVO $from
     * @param CurrencyVO $to
     * @return string
     */
    public function getConvertValue($from, $to);
}