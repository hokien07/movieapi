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
