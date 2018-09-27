<?php
/**
 * Global settings for project configuration
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

namespace Middlewares;

use Mw\Psr7Validation\Validator\RequestValidatorInterface;
use Mw\Psr7Validation\Validator\ValidationResult;
use Mw\Psr7Validation\Validator\ValidatorInterface;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface as Request;
use Psr\Http\Message\ServerRequestInterface as Response;

/**
 * JSON Schea middleware
 *
 * @category  Middleware
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class SchemaValidatorMiddleware
{

    private $validator;
    private $responseCode;

    /**
     * ValidationMiddleware constructor.
     *
     * @param ValidatorInterface $validator    The validator to use for validating
     *                                         request bodies
     * @param int                $responseCode The response code to use when
     *                                         validation failed
     */
    public function __construct(ValidatorInterface $validator, $responseCode = 422)
    {
        $this->validator = $validator;
        $this->responseCode = $responseCode;
    }

    /**
     * The actual middleware function. Invokes the validator and passes the
     * request to the next middleware if validation was successful.
     *
     * @param Request  $request  The incoming request
     * @param Response $response The HTTP response
     * @param callable $next     The next middleware
     *
     * @return MessageInterface The HTTP response
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $json = $request->getParsedBody();
        $validationResult = new ValidationResult();

        if ($this->validator instanceof RequestValidatorInterface) {
            $this->validator->validateRequest($request, $validationResult);
        }

        $this->validator->validateJson($json, $validationResult);

        if ($validationResult->isSuccessful()) {
            return $next($request, $response);
        } else {
            $errors = json_decode(json_encode($validationResult), true);
            $message = [];

            foreach ($errors as $error) {
                $message[] = $error[0];
            }

            $respData = [
                'code' => $this->responseCode,
                'message' => 'unprocesable etity',
                'data' => [
                    'trace' => $message
                ]
            ];

            $jsonResponse = json_encode($respData);
            $response->getBody()->write($jsonResponse);

            return $response
                ->withStatus($this->responseCode)
                ->withHeader('content-type', 'application/json');
        }
    }
}
