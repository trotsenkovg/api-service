<?php

namespace App\Console\Commands;

use App\Schedules\LamodaStockUpdate;
use App\Services\Lamoda\Lamoda;
use App\Services\Moysklad\Moysklad;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class LamodaUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lamoda:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Lamoda items from Mysklad';

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
     * @return void
     * @throws GuzzleException
     */
    public function handle()
    {
        $call = new LamodaStockUpdate();
        $call();
    }
}
