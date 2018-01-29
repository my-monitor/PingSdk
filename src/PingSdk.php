<?php

namespace MyMonitor\PingSdk;

use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PingSdk {
    private $client;
    private $token;

    public function __construct(\GuzzleHttp\Client $client,$token){
        $this->client = $client;
        $this->token = $token;
    }

    public function ping($serviceKey){
        try {
            $this->client->get("/api/ping/{$serviceKey}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                ],
            ]);
        } catch (ClientException $e){
            if($e->getCode() == 404){
                throw new NotFoundHttpException("Key [{$serviceKey}] is not found");
            }
            throw $e;
        }
    }
}