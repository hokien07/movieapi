<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Services\MovieService;
use App\Transformers\MovieTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class HomeApiController extends ApiController
{
    private MovieService $service;
    private Manager $fractal;
    private MovieTransformer $transformer;

    public function __construct(Manager $fractal, MovieTransformer $transformer, MovieService $service)
    {
        $this->service = $service;
        $this->fractal= $fractal;
        $this->transformer = $transformer;
    }

    /**
     * @OA\Get (
     *     path="/api/movie/popular",
     *     tags={"movie"},
     *     summary="Get pupular movie",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function popular (): JsonResponse
    {
        $movies = new Collection($this->service->getPopular(), $this->transformer);
        return response()->json($this->fractal->createData($movies)->toArray());
    }

    /**
     * @OA\Get (
     *     path="/api/movie/trend",
     *     tags={"movie"},
     *     summary="Get trend movie",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function trend () {
        $movies = new Collection($this->service->getTrend(), $this->transformer);
        return response()->json($this->fractal->createData($movies)->toArray());
    }

    /**
     * @OA\Get (
     *     path="/api/movie/top-rate",
     *     tags={"movie"},
     *     summary="Get Top Rate movie",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function topRate () {
        $movies = new Collection($this->service->topRate(), $this->transformer);
        return response()->json($this->fractal->createData($movies)->toArray());
    }

    /**
     * @OA\Get (
     *     path="/api/movie/detail/{serverId}",
     *     tags={"movie"},
     *     summary="Get movie detail by serverId",
     *      @OA\Parameter(
     *           name="serverId",
     *           in="path",
     *           required=true,
     *           description="Server id of movie",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent()
     *     )
     * )
     * @param Request $request
     * @param string $serverId
     */
    public function detail (Request $request, string $serverId)
    {
        $movie = $this->service->findByServerId($serverId);
        return response()->json($this->transformer->transform($movie));
    }
}

