<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RecommendedBooksResource;
use App\Services\RecommendationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index(RecommendationService $recommendationService): JsonResponse
    {
        $recommendedBooks = $recommendationService->recommend();
        return customResponse(RecommendedBooksResource::collection($recommendedBooks), '', 200);
    }
}
