<?php


namespace App\Services\Lamoda;


class Lamoda extends LamodaServiceRequest
{

    public function __construct()
    {
        $this->url  = env('LAMODA_API_URL');
        $this->user = env('LAMODA_API_USER');
        $this->key  = env('LAMODA_API_KEY');
    }

    /**php
     * @action GetProductStocks
     * @method GET
     */
    public function getProductStocks()
    {
        return $this->sendRequest('GetProductStocks', 'GET');
    }
}
