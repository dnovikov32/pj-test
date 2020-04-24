<?php

namespace modules\depot\common\client;

use yii\httpclient\Client;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use modules\depot\common\client\DummyHttpClient;

class GoogleMapClient
{
    /** @var string */
    private $url = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    /** @var string */
    private $key;

    /** @var Client|DummyHttpClient */
    private $client;

    public function __construct($client, string $key)
    {
        $this->client = $client;
        $this->key = $key;
    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     * @throws InvalidConfigException
     * @throws Exception
     */
    public function getDistance(string $from, string $to)
    {
        $response = $this->client->createRequest()
            ->setMethod('GET')
            ->setUrl($this->url)
            ->setData([
                'origins' => $from,
                'destinations' => $to,
                'key' => $this->key
            ])
            ->send();

        if (! $response->isOk) {
            throw new Exception('Не удалось получить ответ от API');
        }

        if (isset($response->data['error_message'])) {
            throw new Exception($response->data['error_message']);
        }

        // It remains to parse the answer from google

        return $response->data['distance'] ?? 0;
    }
}