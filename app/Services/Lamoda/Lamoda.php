<?php


namespace App\Services\Lamoda;


use App\Services\RequestHelper;

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


    /**php
     * @action ProductStockUpdate
     * @method POST
     */
    public function productStockUpdate($body = null)
    {
        $this->sendRequest('ProductStockUpdate', 'POST', $body);
    }



}
