<?php

namespace Helpers;

trait ExceptionsHelper
{
    public static function processException(\Exception $err)
    {
        $message = $err->getMessage();

        switch ($err->getCode()) {
            case 404:
                return [
                    'code' => 404,
                    'message' => 'not found',
                    'data' => [
                        'trace' => [$err->getMessage()]
                    ]
                ];
                break;

            case 401:
                return [
                    'code' => 401,
                    'message' => 'unauthorized',
                    'data' => [
                        'trace' => [$err->getMessage()]
                    ]
                ];
                break;

            case 422:
                return [
                    'code' => 422,
                    'message' => 'unauthorized',
                    'data' => [
                        'trace' => [$err->getMessage()]
                    ]
                ];
                break;

            default:
                if (preg_match('/duplicate key value violates unique constraint/', $message)) {
                    return [
                        'code' => 409,
                        'message' => 'conflict',
                        'data' => [
                            'trace' => ['duplicate key value']
                        ]
                    ];
                } else {
                    return [
                        "code" => 500,
                        "message" => $err->getMessage(),
                        "data" => [
                            "trace" => $err->getTrace()
                        ]
                    ];
                }
                break;
        }
    }
}