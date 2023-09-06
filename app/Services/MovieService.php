<?php


namespace App\Services;
use App\Models\Movie;

class MovieService extends ModelService
{
    public function __construct()
    {
        $this->model = resolve(Movie::class);
    }

    public function getByType(string $type, int $limit = 10, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return $this->model->where('type', $type)
                ->whereHas('categories',  function ($q) {
                    $q->whereNotIn('id', 19);
                })
                ->orderBy($sort, "DESC")->limit($limit)->get();
        }
        return $this->model->where('type', $type)
            ->whereHas('categories',  function ($q) {
                $q->whereNotIn('id', 19);
            })->orderBy($sort, "DESC")->paginate($limit);
    }

    public function getPhimRap(int $limit = 5, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return $this->model->where('chieu_rap', 1)->orderBy($sort, "DESC")->limit($limit)->get();
        }
        return $this->model->where('chieu_rap', 1)->orderBy($sort, "DESC")->paginate($limit);
    }

    public function getRanDomForSlide( $paginate = false) {
        if(!$paginate) {
            return $this->model->whereHas('categories',  function ($q) {
                $q->whereNotIn('id', 19);
            })->inRandomOrder()->limit(10)->get();
        }
        return $this->model->whereHas('categories',  function ($q) {
            $q->whereNotIn('id', 19);
        })->inRandomOrder()->paginate(20);
    }

    public function getTrending() {
        return $this->model->where('chieu_rap', 1)->orderBy('view', "DESC")->first();
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
                $q->where('name', 'LIKE', "%$search%");
            })->paginate(20);
    }


    public function getPhimThuyetMinh ($limit = 20, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return $this->model->where('lang', 'LIKE', "%Thuyết Minh%")->orderBy('view', "DESC")->limit($limit)->get();
        }
        return $this->model->where('lang', 'LIKE', "%Thuyết Minh%")->orderBy('view', "DESC")->paginate($limit);
    }

    public function getPhimLongTieng ($limit = 20, string $sort = 'view', $paginate = false) {
        if(!$paginate) {
            return $this->model->where('lang', 'LIKE', "%Lồng Tiếng%")->orderBy('view', "DESC")->limit($limit)->get();
        }
        return $this->model->where('lang', 'LIKE', "%Lồng Tiếng%")->orderBy('view', "DESC")->paginate($limit);
    }
}
