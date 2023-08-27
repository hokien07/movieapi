<?php


namespace App\View\Composers;


use App\Services\MovieService;
use Illuminate\View\View;

class TopPhimLeComposer
{
    private MovieService $service;

    public function __construct(MovieService $service)
    {
        $this->service = $service;
    }

    public function compose(View $view)
    {
        $view->with('phimLe', $this->service->getByType('single'));
    }
}
