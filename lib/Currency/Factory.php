<?php


namespace Currency;

use \Currency\Exception\CurrencyException;
use \Currency\Loader\OpenExchangeLoader;

class Factory
{
    // string[] list of known currencies, code: name
    private $currencies = [];

    /** @var  DataLoader */
    private $dataLoader;

    public function __construct()
    {
        $this->dataLoader = new OpenExchangeLoader();
        $this->currencies = $this->dataLoader->getCurrencies();
    }

    /**
     * @param $code
     * @param int $value
     * @return CurrencyVO
     * @throws CurrencyException
     */
    public function getByCode($code, $value = 0) {
        if (!$this->checkCode($code)) {
            throw new CurrencyException('Unknown currency with code: ' . $code);
        }

        $out = new CurrencyVO();
        $out->code = $code;
        $out->name = $this->currencies[$code];
        $out->value = $value;

        return $out;
    }

    public function checkCode($code) {
        return !empty($this->currencies[$code]);
    }

    public function getList() {
        return $this->currencies;
    }

    public function getDataLoader() {
        return $this->dataLoader;
    }
}