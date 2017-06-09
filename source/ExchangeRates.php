<?php
declare(strict_types=1);

namespace IChornuha\nbuer\source;

use yii\base\Theme;
use yii\httpclient;
use IChornuha\nbuer\source\CurrencyRateRepository;

/**
 * Class ExchangeRates
 * @package IChornuha\source
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
    /**
     * @var httpclient\Client
     */
    private $client;
    /**
     * @var CurrencyRateSimpleFactory
     */
    private $factory;
    /**
     * @var
     */
    private $config;

    /**
     * ExchangeRates constructor.
     * @param array $config
     */
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


    /**
     * Do request to API and save response as CurrencyRate instances in CurrencyRateRepository
     * @return ExchangeRates
     */
    public function loadData(): self
    {
        $response = $this->request($this->prepareRequestData());
        $response = json_decode($response, true);
        foreach ($response as $item) {
            $this->repository->save($this->factory->createInstanceOfRateDataClass($item));
        }
        return $this;

    }

    /**
     * TODO
     * Not implemented yet
     * @param \DateTimeInterface $dateTime
     */
    public function getByDate(\DateTimeInterface $dateTime)
    {
        $this->repository->getByDate($dateTime);
    }

    /**
     * @param array $data
     * @return httpclient\Response
     */
    private function request(array $data)
    {
     return  $this->client->get('', $data)->send();

    }

    /**
     * @return array
     */
    private function prepareRequestData()
    {
        return [
            'valcode' => $this->config['currencyCode'],
            'date' => date('Ymd'),
            'json'
        ];


    }

}