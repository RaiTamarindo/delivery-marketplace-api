<?php

namespace JampApp\Middleware;

use Respect\Validation\Rules;

class UserValidatorMiddleware extends ValidatorMiddleware {
    
    protected function getRules(): Rules\KeySet {
        return new Rules\KeySet(
            new Rules\Key('name', new Rules\Length(1, 255)),
            new Rules\Key('email', new Rules\AllOf(
                new Rules\Length(1, 255),
                new Rules\Email(),
            )),
            new Rules\Key('password', new Rules\Length(10, 32)),
        );
    }
}

?>