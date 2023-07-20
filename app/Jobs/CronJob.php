<?php

namespace App\Jobs;

use App\Models\Cron;
use App\Models\CronDetail;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CronJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $baseUrl;
    private int $start;

    /**
     * Create a new job instance.
     *
     * @param int $start
     */
    public function __construct(int $start)
    {
        $this->baseUrl = config('cron.list');
        $this->start = $start;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client();

        $content = $client->get("$this->baseUrl$this->start");
        $content = json_decode($content->getBody()->getContents());

        $cron = Cron::query()->create([
            "date" => now(),
            "total" => $content->pagination->totalPages,
            "current" => $content->pagination->currentPage,
            "status" => 0
        ]);

        if($cron) {
            $details = [];
            foreach ($content->items as $item) {
                $detail = [
                    "cron_id" => $cron->id,
                    "payload" => json_encode($item),
                ];
                $details[] = $detail;
            }
            CronDetail::query()->insert($details);
        }
    }
}
