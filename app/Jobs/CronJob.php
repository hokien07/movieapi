<?php

namespace App\Jobs;

use App\Models\Cron;
use App\Models\CronDetail;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CronJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $baseUrl;

    /**
     * Create a new job instance.
     *
     */
    public function __construct()
    {
        $this->baseUrl = config('cron.list');
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws GuzzleException
     */
    public function handle()
    {

        $cron = Cron::query()->where('status', 0)->first();
        if($cron) {
            $start = $cron->current + 1;
            if($start == $cron->total) {
                $cron->fill(['status' => 1])->save();
                return;
            }
        }else {
            $start = 1;
            $cron = Cron::query()->create([
                "date" => now(),
                "total" => 0,
                "current" => 0,
                "status" => 0
            ]);
        }

        $client = new Client();
        $content = $client->get("$this->baseUrl$start");
        $content = json_decode($content->getBody()->getContents());

        $cron->fill([
            "date" => now(),
            "total" => $content->pagination->totalPages,
            "current" => $start,
            "status" => 0
        ])->save();

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
