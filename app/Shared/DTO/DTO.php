<?php

namespace App\Shared\DTO;

use ArrayIterator;
use IteratorAggregate;

abstract readonly class DTO implements IteratorAggregate
{
    public abstract function toArray(): array;

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->toArray());
    }
}

