<?php

namespace App\Console\Commands;

use App\Jobs\CronJob;
use Illuminate\Console\Command;

class CronCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch list of movie';

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
        CronJob::dispatch(1);
    }
}
