<?php


namespace App\View\Composers;


use App\Services\CategoryService;
use Illuminate\View\View;

class CatComposer
{
    private CategoryService $catService;


    public function __construct(CategoryService $catService)
    {
        $this->catService = $catService;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->catService->getAll());
    }

}
