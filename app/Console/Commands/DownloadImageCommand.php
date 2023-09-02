<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadImageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $movie = Movie::query()->where('dimage', 0)->first();
        if($movie) {
            $thumbName = $this->getFileName($movie->thumb_url);
            $posterName = $this->getFileName($movie->poster);
            Storage::disk('public')->put("$movie->server_id/$thumbName", file_get_contents($movie->thumb_url));
            Storage::disk('public')->put("$movie->server_id/$posterName", file_get_contents($movie->poster));
            $movie->fill([
                'thumb_url' => $thumbName,
                'poster' => $posterName,
                'dimage' => 1
            ])->save();
        }
    }

    private function getFileName(string $link) {
        $arrLink = explode("/", $link);
        return end($arrLink);
    }
}
