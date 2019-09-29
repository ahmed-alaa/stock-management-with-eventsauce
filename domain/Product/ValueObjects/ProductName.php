<?php

namespace Domain\Product\ValueObjects;

use Assert\Assertion;
use Domain\Product\Exceptions\InvalidProductName;

class ProductName
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     * @return ProductName
     * @throws \Assert\AssertionFailedException
     */
    public static function fromString(string $name): self
    {
        return new self($name);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->name;
    }

    /**
     * ProductName constructor.
     * @param string $name
     * @throws \Assert\AssertionFailedException
     */
    private function __construct(string $name)
    {
        try {
            Assertion::notEmpty($name);
        } catch (\Exception $e) {
            throw InvalidProductName::error($e->getMessage());
        }

        $this->name = $name;
    }
}