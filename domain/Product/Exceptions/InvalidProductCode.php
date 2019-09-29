<?php

namespace Domain\Product\Exceptions;

/**
 * Class InvalidProductCode
 * @package Domain\Product\Exceptions
 */
final class InvalidProductCode extends \InvalidArgumentException
{
    public static function error(string $msg): InvalidProductCode
    {
        return new self('Invalid product code because ' . $msg);
    }
}