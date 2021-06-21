<?php


namespace App\Schedules;


use App\Services\Lamoda\Lamoda;
use App\Services\Moysklad\Moysklad;
use GuzzleHttp\Exception\GuzzleException;

class LamodaStockUpdate
{
    /**
     * @throws GuzzleException
     */
    public function __invoke()
    {
        $lamoda = new Lamoda();
        $sklad  = new Moysklad();

        $skladProducts = json_decode($sklad->getItems(), true);

        $mysklad_items = [];
        foreach ($skladProducts['rows'] as $item) {
            if (isset($item['folder']['pathName']) && $item['folder']['pathName'] == 'Ювелірні вироби') {
                $mysklad_items[] = [
                    'SellerSku' => $item['article'],
                    'Quantity'  => $item['quantity']
                ];
            }
        }
        $lamoda->productStockUpdate($mysklad_items);
    }
}
