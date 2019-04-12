<?php

namespace JumpApp\Middleware;

use Respect\Validation\Rules;

class UserValidatorMiddleware extends ValidatorMiddleware {
    
    protected function getRules(): Rules\AllOf {
        return new Rules\AllOf(
            new Rules\Key('name', new Rules\Length(1, 255)),
            new Rules\Key('email', new Rules\Length(1, 255)),
            new Rules\Key('password', new Rules\Length(10, 32)),
        );
    }
}

?>