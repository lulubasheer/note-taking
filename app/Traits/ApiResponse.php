<?php

namespace App\Traits;

/**
 * Trait which handle API responses
 */
trait ApiResponse
{
    /**
     * Handles success response
     *
     * @param $data
     * @param null $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($data, $message = null, $statusCode = 200)
    {
        return response()->json([
            'status'=> 'Success',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Handles error response
     *
     * @param null $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message = null, $statusCode)
    {
        return response()->json([
            'status'=>'Error',
            'message' => $message,
            'data' => null
        ], $statusCode);
    }

}
