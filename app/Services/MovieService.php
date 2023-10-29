<?php


namespace App\Services;
use App\Models\Movie;
use Illuminate\Support\Facades\Cache;

class MovieService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Movie::class);
    }

    public function getByType(string $type, int $limit = 10, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return Cache::remember("type_limit_". $limit. $type, $this->cacheTime, function () use ($type, $sort, $limit){
                return $this->model->where('type', $type)
                    ->whereHas('categories',  function ($q) {
                        $q->whereNotIn('category_id', [env("PHIM_18")]);
                    })
                    ->orderBy($sort, "DESC")->limit($limit)->get();
            });
        }
        return Cache::remember("type_paginate_" . $paginate . $type, $this->cacheTime, function () use ($type, $sort, $limit){
            return $this->model->where('type', $type)
                ->whereHas('categories',  function ($q) {
                    $q->whereNotIn('category_id', [env("PHIM_18")]);
                })->orderBy($sort, "DESC")->paginate($limit);
        });
    }

    public function getPhimRap(int $limit = 10, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return Cache::remember('chieu_rap_limit_'. $limit, $this->cacheTime, function () use ($sort, $limit) {
                return $this->model->where('chieu_rap', 1)->orderBy($sort, "DESC")->limit($limit)->get();
            });
        }
        return Cache::remember('chieu_rap', $this->cacheTime, function () use ($sort, $limit) {
            $this->model->where('chieu_rap', 1)->orderBy($sort, "DESC")->paginate($limit);
        });
    }

    public function getRanDomForSlide( $paginate = false, $limit = 10) {
        if(!$paginate) {
            return $this->model->whereHas('categories',  function ($q) {
                $q->whereNotIn('category_id', [env("PHIM_18")]);
            })->inRandomOrder()->limit($limit)->get();
        }
        return $this->model->whereHas('categories',  function ($q) {
            $q->whereNotIn('category_id', [env("PHIM_18")]);
        })->inRandomOrder()->paginate($paginate);
    }

    public function getTrending() {
        return Cache::remember('getTrending', $this->cacheTime, function () {
            return $this->model->where('chieu_rap', 1)->orderBy('view', "DESC")->first();
        });
    }

    public function getSapChieu() {
        return Cache::remember('getSapChieu', $this->cacheTime, function () {
           return $this->model->where('status', "ongoing")
               ->whereNotNull('trailer_url')
               ->orderBy('view', "DESC")->limit(10)->get();
        });
    }

    public function findBySlug($slug) {
        return Cache::remember($slug, $this->cacheTime, function () use ($slug) {
           return $this->model->where('slug', $slug)->first();
        });
    }

    public function getSameMovieByCatIds (array $catIds, int $movieId) {
        return $this->model->whereHas('categories', function ($query) use ($catIds) {
            $query->whereIn('category_id', $catIds)->whereNotIn('category_id', [env("PHIM_18")]);
        })
            ->where('id', '<>', $movieId)
            ->limit(10)->get();
    }

    public function filter ($search) {
        return $this->model->where("name", "LIKE", "%$search%")
            ->orWhere('origin_name', "LIKE", "%$search%")
            ->orWhere('description', "LIKE", "%$search%")
            ->whereHas('actors', function ($q) use ($search){
                $q->where('name', 'LIKE', "%$search%");
            })
            ->whereHas('directors', function ($q) use ($search){
                $q->where('name', 'LIKE', "%$search%");
            })
            ->whereHas('countries', function ($q) use ($search){
                $q->where('name', 'LIKE', "%$search%");
            })
            ->whereHas('episodes', function ($q) use ($search){
                $q->where('name', 'LIKE', "%$search%");
            })
            ->whereHas('categories', function ($q) use ($search){
                $q->where('name', 'LIKE', "%$search%")->whereNotIn('category_id', [env("PHIM_18")]);
            })->paginate(20);
    }


    public function getPhimThuyetMinh ($limit = 20, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return $this->model->where('lang', 'LIKE', "%Thuyết Minh%")->orderBy($sort, "DESC")->limit($limit)->get();
        }
        return $this->model->where('lang', 'LIKE', "%Thuyết Minh%")->orderBy($sort, "DESC")->paginate($limit);
    }

    public function getPhimLongTieng ($limit = 20, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return $this->model->where('lang', 'LIKE', "%Lồng Tiếng%")->orderBy($sort, "DESC")->limit($limit)->get();
        }
        return $this->model->where('lang', 'LIKE', "%Lồng Tiếng%")->orderBy($sort, "DESC")->paginate($limit);
    }
}
