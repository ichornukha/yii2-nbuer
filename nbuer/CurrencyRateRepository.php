<?php

declare(strict_types=1);

namespace IChornuha\nbuer\nbuer;

use IChornuha\nbuer\nbuer\CurrencyRate;

/**
 * Class CurrencyRateRepository
 * @package IChornuha\nbuer\nbuer
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
     * @param \IChornuha\nbuer\nbuer\CurrencyRate $rate
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
     * @return \IChornuha\nbuer\nbuer\CurrencyRate
     */
    public function getByDate(\DateTimeInterface $dateTime): CurrencyRate
    {
        //TODO
    }
}