<?php

namespace Domain\Product\Exceptions;

/**
 * Class InvalidProductName
 * @package Domain\Product\Exceptions
 */
final class InvalidProductName extends \InvalidArgumentException
{
    public static function error(string $msg): InvalidProductName
    {
        return new self('Invalid product name because ' . $msg);
    }
}