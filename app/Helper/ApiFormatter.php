<?php

namespace App\Helper;

class ApiFormatter
{
    protected static $response = [
        'meta' => [
            'code' => null, //kode kayak 200 404 500
            'messagge' => null, //pesannya
        ],

        'data' => null

    ];

    public static function createApi($code = null, $message = null, $data = null)
    {
        self::$response['meta']['code'] = $code;
        self::$response['meta']['messagge'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
