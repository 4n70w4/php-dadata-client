<?php


namespace DadataClient;


use BaseClient\BaseClientFactory;
use GuzzleHttp\RequestOptions;

class DaDataClientFactory extends BaseClientFactory {



    /**
     * @param $token
     * @param $csrftoken
     * @param $referer
     * @param string $base_uri
     *
     * @return \GuzzleHttp\Client
     */
    public function getTransport($token, $csrftoken, $referer, $base_uri = 'https://dadata.ru/api/v2/') {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Token {$token}",
            'x-csrftoken' => $csrftoken,
            'referer' => $referer,
        ];

        return $this->getClient($base_uri, false, [RequestOptions::HEADERS => $headers]);
    }



}