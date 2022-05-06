<?php

namespace App\Http\Controllers;

use App\Services\Service;
use App\Services\CatalogService;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public $service;
    public $catalogService;
    public $mainCategoriesList;

    public function __construct()
    {
        $this->mainCategoriesList = get_main_categories_list();

        $this->service = new Service();
        $this->catalogService = new CatalogService($this->mainCategoriesList);

        View::share(['mainCategoriesList' => $this->mainCategoriesList]);
    }
}
