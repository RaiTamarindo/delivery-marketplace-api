<?php

namespace JumpApp\Middleware;

use Respect\Validation\Rules;

class StoreValidatorMiddleware extends ValidatorMiddleware {

    protected function getRules(): Rules\KeySet {
        return new Rules\KeySet(
            new Rules\Key('name', new Rules\Length(1, 64)),
            new Rules\Key('image', new Rules\Length(null, 512), false),
            new Rules\Key('latitude', new Rules\Numeric()),
            new Rules\Key('longitude', new Rules\Numeric()),
            new Rules\Key('user', new Rules\Key('id', new Rules\NotOptional())),
        );
    }

}

?>