<?php

declare(strict_types=1);

namespace Domain\Product\Entities;

use Domain\Product\Events\ProductAdded;
use Domain\Product\ValueObjects\ProductCode;
use Domain\Product\ValueObjects\ProductIdentifier;
use Domain\Product\ValueObjects\ProductName;
use EventSauce\EventSourcing\AggregateRoot;
use EventSauce\EventSourcing\AggregateRootBehaviour;

/**
 * Class Product
 * @package Domain\Product\Entities
 */
class Product implements AggregateRoot
{
    use AggregateRootBehaviour;

    /**
     * @var ProductIdentifier
     */
    private $identifier;

    /**
     * @var ProductCode
     */
    private $code;

    /**
     * @var ProductName
     */
    private $name;

    /**
     * @param ProductCode $code
     * @param ProductName $name
     * @return void
     */
    public function addProduct(ProductCode $code, ProductName $name): void
    {
        $this->recordThat(new ProductAdded($code, $name));
    }

    /**
     * @param ProductAdded $productAdded
     */
    public function applyProductAdded(ProductAdded $productAdded)
    {
        $this->identifier = $this->aggregateRootId();
        $this->code = $productAdded->toPayload()['product_code'];
        $this->name = $productAdded->toPayload()['product_name'];
    }
}