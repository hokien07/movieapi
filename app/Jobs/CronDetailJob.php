<?php

namespace App\Jobs;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Country;
use App\Models\CronDetail;
use App\Models\Director;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\Server;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        $details = CronDetail::query()->where('status', 0)->limit(100)->get();
        foreach ($details as $detail) {
            DB::beginTransaction();
            try {
                $movie = json_decode($detail->payload);
                $client = new Client();
                $content = $client->get($this->baseUrl . $movie->slug);
                $content = json_decode($content->getBody()->getContents());

                $movie = $this->storeMovie($content->movie);
                if($movie) {
                    $actorIds = $this->storeActor($content->movie->actor);
                    $movie->actors()->sync($actorIds);

                    $directors = $this->storeDirector($content->movie->director);
                    $movie->directors()->sync($directors);

                    $countries = $this->storeCountry($content->movie->country);
                    $movie->countries()->sync($countries);

                    $categories = $this->storeCategory($content->movie->category);
                    $movie->categories()->sync($categories);

                    $episodes = $this->storeEpisodes($content->episodes);
                    $movie->episodes()->sync($episodes);
                    $detail->fill(['status' => 1])->save();
                }
                DB::commit();
            }catch (\Exception $e) {
                $detail->fill(['status' => 2])->save();
                Log::error("Crawl movie detail failed ==> " . $e->getMessage());
                DB::commit();
            }
        }
    }

    private function storeEpisodes (array $episodes) : array
    {
        $ids = [];
        foreach ($episodes as $episode) {
            $server = Server::query()->where('name', $episode->server_name)->first();
            if(!$server) {
                $server = Server::query()->create([
                    "name" => $episode->server_name
                ]);
            }

            foreach ($episode->server_data as $data) {
                $item = Episode::query()->where('link_embed', $data->link_embed)->first();
                if(!$item) {
                    $item = Episode::query()->create([
                        'name' => $data->name,
                        'slug' => $data->slug,
                        'file_name' => $data->filename,
                        'link_embed' => $data->link_embed,
                        'link_m3u8' => $data->link_m3u8,
                        "server_id" => $server->id
                    ]);
                }
                array_push($ids, $item->id);
            }
        }

        return $ids;
    }

    private function storeCategory (array $categories) : array
    {
        $ids = [];
        foreach ($categories as $category) {
            $temp = Category::query()->where('server_id', $category->id)->first();
            if($temp) {
                array_push($ids, $temp->id);
            }else {
                $item = Category::query()->create([
                    'server_id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                ]);
                array_push($ids, $item->id);
            }
        }
        return $ids;
    }

    private function storeCountry (array $countries) : array
    {
        $ids = [];
        foreach ($countries as $country) {
            $temp = Country::query()->where('server_id', $country->id)->first();
            if($temp) {
                array_push($ids, $temp->id);
            }else {
                $item = Country::query()->create([
                    'server_id' => $country->id,
                    'name' => $country->name,
                    'slug' => $country->slug,
                ]);
                array_push($ids, $item->id);
            }
        }

        return $ids;
    }

    private function storeDirector (array $directors) :array
    {
        $ids = [];
        foreach ($directors as $director) {
            $temp = Director::query()->where('name', $director)->first();
            if($temp) {
                array_push($ids, $temp->id);
            }else {
                $item = Director::query()->create([
                    'name' => $director
                ]);
                array_push($ids, $item->id);
            }
        }

        return $ids;
    }

    private function storeActor(array $actors): array
    {
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

        return $ids;
    }

    private function storeMovie($movie) {
        if($movie->view == 0) return false;
        $item = Movie::query()->where("slug", $movie->slug)->first();
        $thumbName = $this->getFileName($movie->thumb_url);
        $posterName = $this->getFileName($movie->poster_url);

        if(!$item) {
            try {
                Storage::cloud()->put("$movie->_id/$thumbName", file_get_contents($movie->thumb_url));
                if($movie->poster_url) {
                    Storage::cloud()->put("$movie->_id/$posterName", file_get_contents($movie->poster_url));
                }
                return Movie::query()->create([
                    "server_id" => $movie->_id,
                    "name" => $movie->name,
                    "origin_name" =>$movie->origin_name,
                    "slug" =>$movie->slug,
                    "description" =>$movie->content,
                    "type" => $movie->type,
                    "status"  => $movie->status,
                    "thumb_url" => $thumbName,
                    "poster" => $posterName,
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
                    "active" => 1,
                    "dimage" => 1
                ]);
            }catch (\Exception $e) {
                Log::error("Crawl movie detail failed ==> " . $e->getMessage());
                return null;
            }

        }
        try {
            Storage::cloud()->delete(["$item->server_id/$thumbName", "$item->server_id/$posterName"]);
            Storage::cloud()->put("$item->server_id/$thumbName", file_get_contents($movie->thumb_url));
            if($movie->poster_url) {
                Storage::cloud()->put("$item->server_id/$posterName", file_get_contents($movie->poster_url));
            }
            $item->fill([ "thumb_url" => $thumbName, "poster" => $posterName])->save();
            return $item->refresh();
        }catch (\Exception $e) {
            Log::error("Crawl movie detail failed ==> " . $e->getMessage());
            return null;
        }

    }

    private function getFileName(string $link) {
        $arrLink = explode("/", $link);
        return end($arrLink);
    }
}
