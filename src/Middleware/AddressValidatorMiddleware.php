<?php

namespace JampApp\Middleware;

use Respect\Validation\Rules;

class AddressValidatorMiddleware extends ValidatorMiddleware {

    protected function getRules(): Rules\KeySet {
        return new Rules\KeySet(
            new Rules\Key('zipcode', new Rules\AllOf(
                new Rules\Length(8, 8),
                new Rules\Digit(),
            )),
            new Rules\Key('city', new Rules\Length(1, 128)),
            new Rules\Key('district', new Rules\Length(1, 128)),
            new Rules\Key('street', new Rules\Length(1, 128)),
            new Rules\Key('building_number', new Rules\Length(1, 16)),
            new Rules\Key('latitude', new Rules\Numeric()),
            new Rules\Key('longitude', new Rules\Numeric()),
            new Rules\Key('user', new Rules\Key('id', new Rules\NotOptional()), false),
        );
    }

}

?>