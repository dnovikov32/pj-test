<?php

namespace modules\depot\common;

use yii\httpclient\Client;

class GoogleMapClient
{
    /** @var string */
    private $url = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    /** @var string */
    private $key;

    /** @var Client */
    private $client;

    public function __construct(Client $client, string $key)
    {
        $this->client = $client;
        $this->key = $key;
    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     * @throws \yii\base\InvalidConfigException
     */
    public function getDistance(string $from, string $to)
    {
//        $response = $this->client->createRequest()
//            ->setMethod('GET')
//            ->setUrl($this->url)
//            ->setData([
//                'origins' => $from,
//                'destinations' => $to,
//                'key' => $this->key
//            ])
//            ->send();
//
//        if (! $response->isOk) {
//            throw new \Exception('Не удалось получить ответ от API');
//        }
//
//        if (isset($response->data['error_message'])) {
//            throw new \Exception($response->data['error_message']);
//        }

        return 2000;
    }
}