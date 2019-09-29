<?php

namespace Infrastructure\Repositories\Product;

use Domain\Product\Entities\Product;
use EventSauce\EventSourcing\AggregateRootRepository;
use Infrastructure\EventSauce\AbstractAggregateRootRepository;

/**
 * Class ProductWriteRepository
 * @package Infrastructure\Repositories\Product
 */
class ProductWriteRepository extends AbstractAggregateRootRepository implements AggregateRootRepository
{
    /**
     * @var string
     */
    protected $tableName = 'products_stream';

    /**
     * @var string
     */
    protected $aggregateRootClass = Product::class;
}