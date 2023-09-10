<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeletePhim18Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:delete';

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
        $movies = Movie::query()->where('view', 0)->get();

        foreach ($movies as $movie) {
            $thumbName = $this->getFileName($movie->thumb_url);
            $posterName = $this->getFileName($movie->poster);
            if($movie->dimage == 1) {
                Storage::disk('public')->delete(["$movie->server_id/$thumbName", "$movie->server_id/$posterName"]);
            }
            $movie->delete();
        }
    }

    private function getFileName(string $link) {
        $arrLink = explode("/", $link);
        return end($arrLink);
    }
}
