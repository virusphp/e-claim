<?php

namespace App\Service\Poli;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Guzzle\Http\Message\Response;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class Poli
{
    protected $client = null;
    protected $api_url;

    public function __construct()
    {
        $this->client = new Client(['cookies' => true, 'verify' => true]);    
        $this->api_url = config('bpjs.api.endpoint');   
    }
    
    public function getPoliback()
    {
        try {
            $url = $this->api_url . "getalltarifkarcis";
            $response = $this->client->get($url);
            $result = $response->getBody();
            return $result;
        } catch (RequestException $e) {
            $result = Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $result = Psr7\str($e->getResponse());
            }
        } 
    }

    public function getPoli($kode)
    {
        // dd($kode);
        try {
            $url = $this->api_url . "getkarcis/".$kode;
            $response = $this->client->get($url);
            $result = $response->getBody();
            return $result;
        } catch (RequestException $e) {
            $result = Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $result = Psr7\str($e->getResponse());
            }
        } 
    }

    public function getHarga($kdPoli)
    {
        try {
            $url = $this->api_url . "gettarifkarcis/". $kdPoli;
            $response = $this->client->get($url);
            $result = $response->getBody();
            return $result;
        } catch (RequestException $e) {
            $result = Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $result = Psr7\str($e->getResponse());
            }
        } 
    }

    public function getDokter($kdPoli)
    {
        $tgl_reg = date('Y-m-d');
        try {
            $url = $this->api_url . "getdokterpengganti/". $kdPoli ."/". $tgl_reg;
            $response = $this->client->get($url);
            $result = $response->getBody();
            return $result;
        } catch (RequestException $e) {
            $result = Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $result = Psr7\str($e->getResponse());
            }
        } 
    }
}