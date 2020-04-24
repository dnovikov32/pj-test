<?php
namespace modules\depot\common\client;

class DummyHttpClient
{
    public function createRequest()
    {
        return $this;
    }

    public function setMethod(string $url = '')
    {
        return $this;
    }

    public function setUrl(string $url = '')
    {
        return $this;
    }

    public function setData(array $data = [])
    {
        return $this;
    }

    public function send()
    {
        $response = new \stdClass();
        $response->isOk = true;
        $response->data = [
            'distance' => 2000,
        ];

        return $response;
    }

}