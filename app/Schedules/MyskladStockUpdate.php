<?php


namespace App\Schedules;


use App\Services\Lamoda\Lamoda;

class MyskladStockUpdate
{
    public function __invoke()
    {
        $lamoda = new Lamoda();
        $lamoda_product = $lamoda->getProductStocks();

        dd($lamoda_product);
    }
}
