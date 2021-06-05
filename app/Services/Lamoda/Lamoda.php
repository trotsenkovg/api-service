<?php


namespace App\Services\Lamoda;


class Lamoda extends LamodaServiceRequest
{

    public function __construct()
    {
        $this->url      = env('LAMODA_API_URL');
        $this->userID   = env('LAMODA_API_USER');
        $this->password = env('LAMODA_API_PASSWORD');
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
