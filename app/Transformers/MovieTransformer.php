<?php


namespace App\Transformers;


use App\Models\Movie;
use League\Fractal\TransformerAbstract;

class MovieTransformer extends TransformerAbstract
{

    public function transform(Movie $movie)
    {
        return [
            "name" => $movie->name,
            "origin_name" =>$movie->origin_name,
            "slug" =>$movie->slug,
            "description" =>$movie->content,
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
        ];
    }
}
