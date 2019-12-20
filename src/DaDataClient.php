<?php


namespace DadataClient;


use BaseClient\BaseClient;
use Psr\Http\Message\ResponseInterface;

class DaDataClient extends BaseClient {



    protected function exceptions(ResponseInterface $response, string $content = null) : void {
    }



    /**
     * @param string $query
     *
     * @ string
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