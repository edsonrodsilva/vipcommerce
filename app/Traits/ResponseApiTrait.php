<?php

namespace App\Traits;

trait ResponseApiTrait
{
    /**
     * Core of response api
     * @param       string              $message
     * @param       array|object        $data
     * @param       integer             $statusCode
     * @param       boolean             $isSuccess
     */
    public function coreResponse($message, $data = null, $statusCode, $isSuccess = true)
    {
        if (!$message) return response()->json(['message' => 'Message id required'], 500);

        //Send the response
        if ($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'statusCode' => $statusCode,
                'results' => $data
            ]);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'statusCode' => $statusCode,
            ]);
        }
    }


    /**
     * Send any success response api
     * @param       string              $message
     * @param       array|object        $data
     * @param       integer             $statusCode
     */
    public function success($message, $data, $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode);
    }

    /**
     * Send any error response api
     * @param       string              $message
     * @param       integer             $statusCode
     */
    public function error($message, $statusCode = 500)
    {
        return $this->coreResponse($message, null, $statusCode, false);
    }
}
