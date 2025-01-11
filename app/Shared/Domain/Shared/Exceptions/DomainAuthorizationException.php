<?php

namespace App\Shared\Domain\Shared\Exceptions;

use Exception;

class DomainAuthorizationException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
