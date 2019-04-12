<?php

namespace JampApp\Middleware;

use Respect\Validation\Rules;

class ProductValidatorMiddleware extends ValidatorMiddleware {

    protected function getRules(): Rules\KeySet {
        return new Rules\KeySet(
            new Rules\Key('barcode', new Rules\AllOf(
                new Rules\Length(1, 128),
                new Rules\Digit(),
            )),
            new Rules\Key('name', new Rules\Length(1, 64)),
            new Rules\Key('description', new Rules\Length(1, 65,535)),
        );
    }

}

?>