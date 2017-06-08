<?php
declare(strict_types=1);

namespace IChornuha\nbuer\source;


/**
 * Class CurrencyRate
 * @package IChornuha\source\NationalBankOfUkraineExchangeRates
 * @author Igor Chornukha <igor.chornuha@gmail.com>
 *
 * Basic class for currency rate data.
 * Contain response data from API with saving response structure.
 * Each instance of this class will be in CurrencyRateRepository
 * @see \IChornuha\nbuer\source\CurrencyRateRepository
 */
class CurrencyRate
{

    /**
     * Attribute names saved 'as is' in National Bank API response for easy saving procedure;
     */

    /*
     * Currency code
     */
    private $r030;
    /**
     * Currency name
     */
    private $txt;
    /**
     * Exchange rate in UAH
     */
    private $rate;
    /**
     * Currency ISO code
     */
    private $cc;
    /**
     * Date
     */
    private $exchangedate;

    public function __construct(array $data)
    {
        $this->r030 = (int)$data['r030'];
        $this->txt = (string)$data['txt'];
        $this->rate = (float)$data['rate'];
        $this->cc = (string)$data['cc'];
        $this->exchangedate = (string)$data['exchangedate'];
    }

    /**
     * @return mixed
     */
    public function getCurrencyDigitalCode()
    {
        return $this->r030;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->txt;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @return mixed
     */
    public function getISOCode()
    {
        return $this->cc;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->exchangedate;
    }


}