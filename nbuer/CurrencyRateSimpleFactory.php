<?php
declare(strict_types=1);

namespace IChornuha\nbuer\nbuer;


/**
 * Class CurrencyRateSimpleFactory
 * @package IChornuha\nbuer\nbuer
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