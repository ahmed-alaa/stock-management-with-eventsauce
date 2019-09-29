<?php

declare(strict_types=1);

namespace Domain\Product\Commands;

use Domain\Product\ValueObjects\ProductCode;
use Domain\Product\ValueObjects\ProductIdentifier;
use Domain\Product\ValueObjects\ProductName;
use EventSauce\EventSourcing\AggregateRootId;

/**
 * Class AddProduct
 * @package Domain\Product\Commands
 */
final class AddProduct
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * AddProduct constructor.
     *
     * @param string $code
     * @param string $name
     */
    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * @return AggregateRootId
     * @throws \Exception
     */
    public function getIdentifier(): AggregateRootId
    {
        return ProductIdentifier::generate();
    }

    /**
     * @return ProductCode
     * @throws \Assert\AssertionFailedException
     */
    public function getCode(): ProductCode
    {
        return ProductCode::fromString($this->code);
    }

    /**
     * @return ProductName
     * @throws \Assert\AssertionFailedException
     */
    public function getName(): ProductName
    {
        return ProductName::fromString($this->name);
    }
}