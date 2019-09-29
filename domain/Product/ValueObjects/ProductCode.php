<?php

namespace Domain\Product\ValueObjects;

use Assert\Assertion;
use Domain\Product\Exceptions\InvalidProductCode;

/**
 * Class ProductCode
 * @package Domain\Product\ValueObjects
 */
class ProductCode
{
    /**
     * @var string
     */
    private $code;

    /**
     * @param string $code
     * @return ProductCode
     * @throws \Assert\AssertionFailedException
     */
    public static function fromString(string $code): self
    {
        return new self($code);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->code;
    }

    /**
     * ProductName constructor.
     * @param string $code
     * @throws \Assert\AssertionFailedException
     */
    private function __construct(string $code)
    {
        try {
            Assertion::notEmpty($code);
        } catch (\Exception $e) {
            throw InvalidProductCode::error($e->getMessage());
        }

        $this->code = $code;
    }
}