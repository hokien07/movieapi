<?php

namespace App\Console\Commands;

use App\Jobs\CronDetailJob;
use Illuminate\Console\Command;

class CronDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:detail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get detail of cron and fetch data';

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
        CronDetailJob::dispatch();
    }
}
