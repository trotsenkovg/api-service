<?php

namespace App\Console\Commands;

use App\Services\Lamoda\Lamoda;
use Illuminate\Console\Command;

class lamodaGetProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lamoda:GetProductStocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all available products from Lamoda';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lamoda = new Lamoda();
        $products = $lamoda->getProductStocks();
        dd($products);

        return 'success';
    }
}
