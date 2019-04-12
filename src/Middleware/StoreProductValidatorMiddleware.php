<?php

namespace JumpApp\Middleware;

use Respect\Validation\Rules;

class StoreProductValidatorMiddleware extends ValidatorMiddleware {

    protected function getRules(): Rules\AllOf {
        return new Rules\AllOf(
            new Rules\Key('price', new Rules\Numeric()),
            new Rules\Key('is_available', new Rules\BoolType()),
            new Rules\KeyNested('store.id', new Rules\NotOptional()),
            new Rules\KeyNested('product.id', new Rules\NotOptional()),
        );
    }

}

?>