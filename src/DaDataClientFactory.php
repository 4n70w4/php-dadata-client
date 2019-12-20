<?php


namespace DadataClient;


use BaseClient\BaseClientFactory;
use GuzzleHttp\RequestOptions;

class DaDataClientFactory extends BaseClientFactory {



    /**
     * @param string $token
     * @param string $csrftoken
     * @param string $referer
     * @param string $base_uri
     *
     * @return \GuzzleHttp\Client
     */
    public function getTransport(string $token, string $csrftoken, string $referer = 'https://dadata.ru/suggestions/usage/party/', string $base_uri = 'https://dadata.ru/api/v2/') {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Token {$token}",
            'x-csrftoken' => $csrftoken,
            'referer' => $referer,
        ];

        return $this->getClient($base_uri, false, [RequestOptions::HEADERS => $headers]);
    }



}