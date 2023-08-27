<?php


namespace App\Services;
use App\Models\Movie;

class MovieService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Movie::class);
    }

    public function getByType(string $type, int $limit = 10, string $sort = 'view') {
        return $this->model->where('type', $type)->orderBy($sort, "DESC")->limit($limit)->get();
    }

    public function getPhimRap(int $limit = 5, string $sort = 'view') {
        return $this->model->where('chieu_rap', 1)->orderBy('view', "DESC")->limit($limit)->get();
    }

    public function getRanDomForSlide() {
        return $this->model->inRandomOrder()->limit(10)->get();
    }

    public function getTrending() {
        return $this->model->orderBy('view', "DESC")->first();
    }

    public function getSapChieu() {
        return $this->model->where('status', "ongoing")
            ->whereNotNull('trailer_url')
            ->orderBy('view', "DESC")->limit(10)->get();
    }

    public function findBySlug($slug) {
        return $this->model->where('slug', $slug)->first();
    }

    public function getSameMovieByCatIds (array $catIds, int $movieId) {
        return $this->model->whereHas('categories', function ($query) use ($catIds) {
            $query->whereIn('category_id', $catIds);
        })
            ->where('id', '<>', $movieId)
            ->limit(30)->get();
    }
}
