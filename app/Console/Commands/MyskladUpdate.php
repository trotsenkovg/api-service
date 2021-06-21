<?php

namespace App\Console\Commands;

use App\Schedules\MyskladStockUpdate;
use Illuminate\Console\Command;

class MyskladUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysklad:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Mysklad orders from Lamoda';

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
     * Execute the console command
     */
    public function handle()
    {
        $call = new MyskladStockUpdate();
        $call();
    }
}
