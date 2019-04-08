<?php
/**
 * Created by PhpStorm.
 * User: mmendy
 * Date: 08/04/2019
 * Time: 15:13
 */

namespace App\Services;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

class Marvel
{
    private $marvelClient;
    private $serializer;
    private $apiKey;

    public function __construct(Client $marvelClient, Serializer $serializer, $apiKey)
    {
        $this->marvelClient = $marvelClient;
        $this->serializer = $serializer;
        $this->apiKey = $apiKey;
    }

    public function getCurrent()
    {
        $uri = ':443/v1/public/comics?apikey='.$this->apiKey;
        $response = $this->marvelClient->get($uri);

        $data = $this->serializer->deserialize($response->getBody()->getContents(), 'array', 'json');

        return [
            'city' => $data['name'],
            'description' => $data['marvel'][0]['main'],
        ];
    }
}