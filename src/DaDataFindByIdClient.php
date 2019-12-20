<?php


namespace DadataClient;


use BaseClient\BaseClient;
use Psr\Http\Message\ResponseInterface;

class DaDataFindByIdClient extends DaDataBaseClient {



    /**
     * @param string $query
     * @param null|integer $count
     *
     * @return string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function party(string $query, $count = null) : string {
        $data = [];
        $data['query'] = $query;

        if($count) {
            $data['count'] = $count;
        }

        $json = json_encode($data);

        return $this->getBody($this->request('POST', 'findById/party', [], $json) );
    }



}