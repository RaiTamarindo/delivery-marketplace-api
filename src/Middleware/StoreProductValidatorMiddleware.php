<?php

namespace JampApp\Middleware;

use Respect\Validation\Rules;

class StoreProductValidatorMiddleware extends ValidatorMiddleware {

    protected function getRules(): Rules\KeySet {
        return new Rules\KeySet(
            new Rules\Key('price', new Rules\Numeric()),
            new Rules\Key('is_available', new Rules\BoolType()),
            new Rules\Key('store', new Rules\Key('id', new Rules\NotOptional())),
            new Rules\Key('product', new Rules\Key('id', new Rules\NotOptional())),
        );
    }

}

?>