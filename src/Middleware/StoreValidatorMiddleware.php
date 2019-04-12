<?php

namespace JumpApp\Middleware;

use Respect\Validation\Rules;

class StoreValidatorMiddleware extends ValidatorMiddleware {

    protected function getRules(): Rules\AllOf {
        return new Rules\AllOf(
            new Rules\Key('name', new Rules\Length(1, 64)),
            new Rules\Key('image', new Rules\Length(null, 512), false),
            new Rules\Key('latitude', new Rules\Numeric()),
            new Rules\Key('longitude', new Rules\Numeric()),
            new Rules\KeyNested('user.id', new Rules\NotOptional()),
        );
    }

}

?>