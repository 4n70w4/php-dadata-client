<?php


namespace DadataClient;


use BaseClient\BaseClientFactory;
use GuzzleHttp\RequestOptions;

class DaDataSuggestionsClientFactory extends BaseClientFactory {



    public function getTransport($token, $base_uri = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/') {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Token {$token}",
        ];

        return $this->getClient($base_uri, false, [RequestOptions::HEADERS => $headers]);
    }



}