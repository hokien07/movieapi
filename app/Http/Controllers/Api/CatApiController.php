<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CatService;
use App\Transformers\CatTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class CatApiController extends Controller
{
    private CatService $service;
    private Manager $fractal;
    private CatTransformer $tranformer;

    public function __construct(CatService $service, Manager $fractal, CatTransformer $transformer)
    {
        $this->service = $service;
        $this->fractal= $fractal;
        $this->tranformer = $transformer;
    }

    /**
     * @OA\Get (
     *     path="/api/cat",
     *     tags={"cat"},
     *     summary="Get all cat",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function index (Request $request) {
        $cats = new Collection($this->service->getAll(), $this->tranformer);
        return response()->json($this->fractal->createData($cats)->toArray());
    }
}
