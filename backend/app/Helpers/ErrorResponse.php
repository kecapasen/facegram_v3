<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;

class ErrorResponse
{
    public static function error(array $message, int $status)
    {
        throw new HttpResponseException(response()->json([...$message], $status));
    }
}
