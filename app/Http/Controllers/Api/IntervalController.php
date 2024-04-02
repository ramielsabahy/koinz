<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreIntervalRequest;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IntervalController extends Controller
{
    public function store(StoreIntervalRequest $request, BookService $service)
    {
        $created = $service->store($request->validated() + ['user_id' => $request->user()->id]);
        if ($created)
            return customResponse((object)[], "Interval saved successfully", Response::HTTP_CREATED);
        return customResponse((object)[], "Can't store interval", Response::HTTP_BAD_REQUEST);
    }
}
