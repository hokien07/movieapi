<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DownloadMissingImageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:image';

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
        $movies = Movie::query()->where('dimage', 1)->limit(100)->get();
        foreach ($movies as $movie) {
            Storage::cloud()->put("$movie->server_id/$movie->thumb_url", file_get_contents( "https://img.ophim9.cc/uploads/movies/$movie->thumb_url"));
            Storage::cloud()->put("$movie->server_id/$movie->poster", file_get_contents("https://img.ophim9.cc/uploads/movies/$movie->poster"));
            $movie->fill(['dimage'=> 2])->save();
        }
    }
}
