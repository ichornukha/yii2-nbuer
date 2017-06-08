<?php

declare(strict_types=1);

namespace IChornuha\nbuer\source;

use IChornuha\nbuer\source\CurrencyRate;

/**
 * Class CurrencyRateRepository
 * @package IChornuha\source\source
 * @author Igor Chornuha <igor.chornuha@gmail.com>
 * @see ExchangeRates
 * @see CurrencyRate;
 *
 * Repository for CurrencyRate instances
 */
class CurrencyRateRepository
{
    /**
     * @var array Storage of CurrencyRate objects
     */
    private $storage = [];

    /**
     * @param \IChornuha\nbuer\source\CurrencyRate $rate
     */
    public function save(CurrencyRate $rate)
    {
        $this->storage[$rate->getDate()][] = $rate;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->storage;
    }

    /**
     * @param \DateTimeInterface $dateTime
     * @return \IChornuha\nbuer\source\CurrencyRate
     */
    public function getByDate(\DateTimeInterface $dateTime): CurrencyRate
    {
        //TODO
    }
}