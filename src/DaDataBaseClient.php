<?php


namespace DadataClient;


use BaseClient\BaseClient;
use Psr\Http\Message\ResponseInterface;

class DaDataBaseClient extends BaseClient {



    /**
     * @param ResponseInterface $response
     * @param string|null $content
     *
     * @throws \Exception
     */
    protected function exceptions(ResponseInterface $response, string $content = null) : void {
        // {"family":"CLIENT_ERROR","reason":"Unsupported Media Type","message":"HTTP 415 Unsupported Media Type"}
        $data = json_decode($content, true);

        if(isset($data['family']) && $data['family'] === 'CLIENT_ERROR') {
            if(isset($data['message']) ) {
                throw new \Exception($data['message']);
            } else {
                throw new \Exception($data['reason']);
            }
        }

    }



}