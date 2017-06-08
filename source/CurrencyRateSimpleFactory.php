<?php
declare(strict_types=1);

namespace IChornuha\nbuer\source;


/**
 * Class CurrencyRateSimpleFactory
 * @package IChornuha\source\source
 * @author Igor Chornuha <igor.chornuha@gmail.com>
 *
 * Implementation Simple Factory pattern for work with CurrencyRate class
 *
 * @see CurrencyRate
 */
class CurrencyRateSimpleFactory
{
    /**
     * @param array $responseData
     * @return CurrencyRate
     */
    public function createInstanceOfRateDataClass(array $responseData): CurrencyRate
    {
        return new CurrencyRate($responseData);
    }
}