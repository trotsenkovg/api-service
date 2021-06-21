<?php


namespace App\Services\Moysklad;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class MoyskladServiceRequest
{
    protected $url;
    protected $user;
    protected $key;

    /**
     * @throws GuzzleException
     */
    protected function getItemsRequest()
    {
        $curl = curl_init();
        $credentials = base64_encode($this->user.':'.$this->key);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$credentials
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
