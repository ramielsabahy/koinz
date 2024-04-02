<?php
if (!function_exists("customeResponse")) {
    function customResponse($data, $message, $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data'  => $data,
            'message'  => $message,
        ], $code);
    }
}
