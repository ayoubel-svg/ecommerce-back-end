<?php

namespace App\Traits;

trait HttpResponses
{
    public function success($data, $message = null, $code = 200)
    {
        return response()->json([
            "status" => "request was succeful",
            "message" => $message,
            "data" => $data
        ], $code);
    }
    public function error($data, $message = null, $code = 404)
    {
        return response()->json([
            "status" => "error has occurd",
            "message" => $message,
            "data" => $data
        ], $code);
    }
}
