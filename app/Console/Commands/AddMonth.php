<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Athlete;
use App\Month;
use App\Helpers\MonthHelper;

class AddMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:months';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check are the required months added for payment functionality and add them to DB if not';

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
     * @return mixed
     */
    public function handle()
    {
        $mounthHelper = new MonthHelper();
        $mounthHelper->addDates([
            date("Y-m-d", strtotime("last month")),
            date("Y-m-d"),
            date("Y-m-d", strtotime("next month"))
        ]);
    }
}
