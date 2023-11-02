<?php
if(!function_exists("getMovieType")) {
    function getMovieType (string $type) {
        switch ($type) {
            case "single":
                return "Phim lẻ";
            case "hoathinh":
                return "Phim hoạt hình";
            case "series":
                return "Phim bộ";
            case "tvshows":
                return "TV Shows";
            default:
                return "";
        }
    }
}

if(!function_exists("getEpxStatus")) {
    function getEpxStatus (string $status) {
        switch ($status) {
            case "completed": return "Full";
            case "ongoing": return "Updating";
            default : return "";
        }
    }
}

if(!function_exists("renderMovieImage")) {
    function renderMovieImage (\App\Models\Movie $movie, $type) {
        if($type == 'thumb') {
            if($movie->dimage == 1 ) {
                return asset('storage/' . $movie->server_id . "/" . $movie->thumb_url);
            }
            return env('MINIO_ENDPOINT') . "/" . env('AWS_BUCKET') . "/" .  $movie->server_id . "/" . $movie->thumb_url;
        }else {
            if($movie->dimage == 1 ) {
                return asset('storage/' . $movie->server_id . "/" . $movie->poster);
            }
            return env('MINIO_ENDPOINT') . "/" . env('AWS_BUCKET') . "/" .  $movie->server_id . "/" . $movie->poster;
        }
    }
}

