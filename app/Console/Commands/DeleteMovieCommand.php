<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteMovieCommand extends Command
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
        try {
            $movies = Movie::whereHas('categories', function ($q) {
                $q->where('category_id', env('PHIM_18', 21));
            })->limit(100)->get();
            foreach ($movies as $movie) {
                $this->info("Delete " . $movie->name);
                Storage::disk('public')->delete(["$movie->server_id/$movie->thumb_url", "$movie->slug/$movie->poster"]);
                $movie->delete();
                $this->info("Success delete " . $movie->name);
            }
        }catch (\Exception $e) {
            $this->info("Error " . $e->getMessage());
        }

    }
}
