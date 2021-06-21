<?php


namespace App\Services\Moysklad;

use GuzzleHttp\Exception\GuzzleException;

class Moysklad extends MoyskladServiceRequest
{
    public function __construct()
    {
        $this->url  = env('MOYSKLAD_API_URL');
        $this->user = env('MOYSKLAD_API_USER');
        $this->key  = env('MOYSKLAD_API_KEY');
    }

    /**
     * @throws GuzzleException
     */
    public function getItems()
    {
        return $this->getItemsRequest();
    }
}
