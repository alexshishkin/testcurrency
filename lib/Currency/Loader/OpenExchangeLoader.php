<?php

namespace Currency\Loader;

use \Common\DataLoader;
use Currency\Exception\CurrencyException;

class OpenExchangeLoader extends DataLoader implements CurrencyLoaderInterface
{
    //
    /**
     * app id fot OpenExchange
     * @url https://openexchangerates.org/signup/
     * @var string
     */
    private $appId = '';

    private const URL_CURRENCIES = 'https://openexchangerates.org/api/currencies.json';
    private const URL_CONVERT = 'https://openexchangerates.org/api/convert/';

    public function __construct()
    {
    }

    public function getCurrencies()
    {
        return $this->get(self::URL_CURRENCIES);
    }

    public function getConvertValue($from, $to)
    {
        if ($this->appId) {
            $url = self::URL_CONVERT . implode('/', [
                    $from->value,
                    $from->code,
                    $to->code,
                ]) . '?app_id=' . $this->appId;
            $result = $this->get($url);
        } else {
            $result = '{"disclaimer":"https://openexchangerates.org/terms/","license":"https://openexchangerates.org/license/","request":{"query":"/convert/19999.95/GBP/EUR","amount":19999.95,"from":"GBP","to":"EUR"},"meta":{"timestamp":1449885661,"rate":1.383702},"response":27673.975864}';
        }
        $data = json_decode($result, 1);

        if (!isset($data['response'])) {
            throw new CurrencyException('Cannot convert currencies');
        }

        return $data['response'];
    }
}