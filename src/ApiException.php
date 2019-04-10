<?php

namespace JumpApp;

class ApiException extends \Exception {

    private $status;

    public function __construct($message, $status) {
        parent::__construct($message);
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

}

?>