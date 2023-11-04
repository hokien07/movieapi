<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MoveImageToCloudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minio:move';

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
            try {
                $this->info("Moving: " . $movie->origin_name);
                $files = Storage::disk('public')->allFiles($movie->server_id);
                foreach ($files as $file) {
                    Storage::cloud()->put($file, Storage::disk('public')->get($file));
                    Storage::disk('public')->delete($file);
                }
                $movie->fill(['dimage'=> 2])->save();
            }catch (\Exception $e) {
                 // Nothing todo.
                Log::error("Movie imag  failed: " . $e->getMessage());
                $movie->fill(['dimage'=> 2])->save();
            }
        }
        $this->info("Move success: " . count($movies) . ' Movie');


    }
}
