<?php

namespace App\Jobs;

use App\Models\Actor;
use App\Models\CronDetail;
use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CronDetailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $baseUrl;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUrl = config('cron.detail');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $detail = CronDetail::query()->where('status', 0)->first();
        if(!$detail) return;
        $movie = json_decode($detail->payload);
        $client = new Client();
        $content = $client->get($this->baseUrl . $movie->slug);
        DB::beginTransaction();
        try {
            $movie = $this->storeMovie($content->movie);
            $actorIds = $this->storeActor($content->movie->actor);
            $movie->actors()->sync($actorIds);

            $directors = $this->storeDirector($content->movie->drictor);
            $movie->directors()->sync($directors);

            $countries = $this->storeCountry($content->movie->country);
            $movie->countries()->sync($countries);

            $categories = $this->storeCategory($content->movie->category);
            $movie->categories()->sync($categories);


            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }


        dd($content->getBody()->getContents());
    }

    private function storeActor(array $actors) {
        $ids = [];
        foreach ($actors as $actor) {
            $temp = Actor::query()->where('name', $actor)->first();
            if($temp) {
                array_push($ids, $temp->id);
            }else {
                $item = Actor::query()->create([
                    'name' => $actor
                ]);
                array_push($ids, $item->id);
            }
        }
    }

    private function storeMovie($movie) {
        return Movie::query()->create([
            "server_id" => $movie->_id,
            "name" => $movie->name,
            "origin_name" =>$movie->origin_name,
            "slug" =>$movie->slug,
            "description" =>$movie->content,
            "release_date" => $movie->year,
            "type" => $movie->type,
            "status"  => $movie->status,
            "thumb_url" => $movie->thumb_url,
            "poster" => $movie->poster_url,
            "is_copyright" => $movie->is_copyright,
            "sub_docquyen" => $movie->sub_docquyen,
            "chieu_rap" => $movie->chieurap,
            "trailer_url" => $movie->trailer_url,
            "time" => $movie->time,
            "episode_current" => $movie->episode_current,
            "episode_total" => $movie->episode_total,
            "quality"  => $movie->quality,
            "lang"  => $movie->lang,
            "noty"  => $movie->notify,
            "show_time"  => $movie->showtimes,
            "year" => $movie->year,
            "view" => $movie->view,
            "active" => 1
        ]);
    }
}
