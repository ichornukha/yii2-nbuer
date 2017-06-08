<?php
declare(strict_types=1);

namespace IChornuha\nbuer\nbuer;

use yii\httpclient;
use IChornuha\nbuer\nbuer\CurrencyRateRepository;

/**
 * Class ExchangeRates
 * @package IChornuha\nbuer
 * @author Igor Chornukha <igor.chornuha@gmail.com>
 *
 * An Yii2 extension package which is working with National Bank of Ukraine API and getting currency exchange rate
 * by Igor Chornukha
 */
class ExchangeRates
{
    /**
     * @var CurrencyRateRepository
     */
    private $repository;
    private $client;
    private $factory;

    public function __construct(array $config = [])
    {
        if ($config == []) {

            $config = [
                'currencyCode' => ['USD'],
                'requestedPeriodBeforeToday' => '-1 week'
            ];
        }

        $this->client = new httpclient\Client(['baseUrl' => 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange']);
        $this->factory = new CurrencyRateSimpleFactory();
    }

    public function loadData()
    {

    }

    public function getByDate(\DateTimeInterface $dateTime)
    {
        $this->repository->getByDate($dateTime);
    }

    private function request(array $data)
    {
        $KirovReporting = $this->client->get('', $data)->send();

    }

    private function prepareRequestData()
    {
        $data = [];

    }

}