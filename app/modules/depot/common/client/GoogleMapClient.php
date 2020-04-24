<?php

namespace modules\depot\common\client;

use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;
use yii\httpclient\Response;

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

        return $this->getResponseDistance($response);
    }

    /**
     * @param Response $response
     * @return int
     * @throws Exception
     */
    private function getResponseDistance(Response $response)
    {
        if (! $response->isOk) {
            throw new Exception('Не удалось получить ответ от API');
        }

        $origin = $response->data['origin_addresses'][0] ?? null;
        $destination = $response->data['destination_addresses'][0] ?? null;
        $error = $response->data['error_message'] ?? null;
        $distance = $response->data['rows'][0]['elements'][0]['distance']['value'] ?? null;

        if ($error) {
            throw new Exception($error);
        }

        if (! $origin) {
            throw new Exception('Не удалось найти город отправления');
        }

        if (! $destination) {
            throw new Exception('Не удалось найти город назначения');
        }

        if (! $distance) {
            throw new Exception('Расстояние не найдено');
        }

        return round($distance / 1000);
    }
}