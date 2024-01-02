<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use App\Constant\Response;

trait ResponseTrait
{
    public function successResponse($data = null, string $message = null, int $code = 200) : JsonResponse
    {
        return response()->json([
            'status' => Response::SUCCESS,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function errorResponse(string $message = null, int $code = 400) : JsonResponse
    {
        return response()->json([
            'status' => Response::ERROR,
            'message' => $message
        ], $code);
    }

    public function warningResponse(string $message = null, int $code = 400) : JsonResponse
    {
        return response()->json([
            'status' => Response::WARNING,
            'message' => $message
        ], $code);
    }

    public function infoResponse(string $message = null, int $code = 200) : JsonResponse
    {
        return response()->json([
            'status' => Response::INFO,
            'message' => $message
        ], $code);
    }
}
