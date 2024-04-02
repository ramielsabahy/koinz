<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreIntervalRequest;
use App\Services\BookService;
use Illuminate\Http\Request;

class IntervalController extends Controller
{
    public function store(StoreIntervalRequest $request, BookService $service)
    {

    }
}
