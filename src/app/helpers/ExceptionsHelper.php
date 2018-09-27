<?php
/**
 * Trait helper to process errors
 *
 * PHP Version 7.1
 *
 * @category  Scafolding
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

namespace Helpers;

/**
 * Trait helper
 *
 * @category  Helper
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
trait ExceptionsHelper
{
    /**
     * Validate errors and return standard response array
     *
     * @param \Exception $err Catched exception obect
     *
     * @return array Standard response
     */
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
