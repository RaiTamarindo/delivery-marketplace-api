<?php

namespace JumpApp\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Respect\Validation\Rules;
use Respect\Validation\Exceptions\NestedValidationException;

use JumpApp\ApiException;

abstract class ValidatorMiddleware {

    public function __invoke(Request $req, Response $res, callable $next) {
        try {
            $this->getRules()->assert($req->getParsedBody());

            return $next($req, $res);
        } catch (NestedValidationException $e) {
            throw new ApiException(\implode(PHP_EOL, $e->getMessages()), 422);
        }
    }

    protected abstract function getRules(): Rules\AllOf;

}

?>