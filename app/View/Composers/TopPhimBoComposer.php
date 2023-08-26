<?php


namespace App\View\Composers;


use App\Services\MovieService;
use Illuminate\View\View;

class TopPhimBoComposer
{
    private MovieService $service;

    public function __construct(MovieService $service)
    {
        $this->service = $service;
    }

    public function compose(View $view)
    {
        $view->with('phimBo', $this->service->getByType('series'));
    }
}
