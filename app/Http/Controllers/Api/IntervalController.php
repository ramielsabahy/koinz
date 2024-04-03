<?php

namespace App\Http\Controllers\Api;

use App\Events\IntervalSubmited;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreIntervalRequest;
use App\Services\BookService;
use App\Services\SendingSMSService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;

class IntervalController extends Controller
{
    public function store(StoreIntervalRequest $request, BookService $service, SendingSMSService $sendingSMSService)
    {
        $created = $service->store($request->validated() + ['user_id' => $request->user()->id]);
        if ($created) {
            event(new IntervalSubmited($request->user()->phone, "Thank you"));
            return customResponse((object)[], "Interval saved successfully", Response::HTTP_CREATED);
        }
        return customResponse((object)[], "Can't store interval", Response::HTTP_BAD_REQUEST);
    }
}
