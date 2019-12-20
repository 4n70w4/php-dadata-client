<?php


namespace DadataClient;


use BaseClient\BaseClient;
use Psr\Http\Message\ResponseInterface;

class DaDataSuggestionsClient extends BaseClient {



    // {"family":"CLIENT_ERROR","reason":"Unsupported Media Type","message":"HTTP 415 Unsupported Media Type"}
    protected function exceptions(ResponseInterface $response, string $content = null) : void {
        $data = json_decode($content, true);

        if(isset($data['family']) && $data['family'] === 'CLIENT_ERROR') {
            if(isset($data['message']) ) {
                throw new \Exception($data['message']);
            } else {
                throw new \Exception($data['reason']);
            }
        }

    }



    /**
     * @param string $query
     *
     * @return string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findByIdParty(string $query) : string {
        $data = [];
        $data['query'] = $query;
        $json = json_encode($data);

        return $this->getBody($this->request('POST', 'findById/party', [], $json) );
    }



}