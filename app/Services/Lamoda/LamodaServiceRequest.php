<?php


namespace App\Services\Lamoda;


abstract class LamodaServiceRequest
{
    protected $url;
    protected $userID;
    protected $password;

    protected function sendRequest($action, $method, $body = null)
    {
        return $this->url.$action;
    }
}
