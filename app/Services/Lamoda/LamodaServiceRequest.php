<?php

namespace App\Services\Lamoda;
use DateTime;

abstract class LamodaServiceRequest
{
    protected $url;
    protected $user;
    protected $key;

    protected function sendRequest($action, $method, $body = null)
    {
        $date   = new DateTime();
        $parameters = [
            'Action'    => $action,
            'Timestamp' => $date->format('c'),
            'UserID'    => $this->user,
            'Version'   => '1.0',
            'Format'    => 'JSON'
        ];

        ksort($parameters);
        $encoded = [];
        foreach ($parameters as $name => $value) {
            $encoded[] = rawurlencode($name) . '=' . rawurlencode($value);
        }
        $concatenated = implode('&', $encoded);
        $parameters['Signature'] =
            rawurlencode(hash_hmac('sha256', $concatenated, $this->key, false));

        try {
            $queryString = http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url."?".$queryString);

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $data = curl_exec($ch);

            curl_close($ch);

            return json_decode($data, true);
        } catch (\Exception $e) {
            echo $e->getMessage() . \PHP_EOL;
        }
    }
}
