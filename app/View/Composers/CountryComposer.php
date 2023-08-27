<?php

namespace App\View\Composers;


use App\Services\CountryService;
use Illuminate\View\View;

class CountryComposer
{
    private CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function compose(View $view)
    {
        $view->with('countries', $this->countryService->getAll());
    }


}
