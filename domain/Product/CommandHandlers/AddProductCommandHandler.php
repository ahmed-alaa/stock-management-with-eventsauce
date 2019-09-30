<?php

declare(strict_types=1);

namespace Domain\Product\CommandHandler;

use Domain\Product\Commands\AddProduct;
use Infrastructure\Repositories\Product\ProductWriteRepository;

/**
 * Class AddProductCommandHandler
 * @package Domain\Product\CommandHandler
 */
final class AddProductCommandHandler
{
    /**
     * @var ProductWriteRepository
     */
    private $repository;

    public function __construct(ProductWriteRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /**
     * @param AddProduct $command
     * @throws \Assert\AssertionFailedException
     */
    public function handle(AddProduct $command)
    {
        /**
         * Retrieve Product Identifier
         */
        $productId = $command->getIdentifier();

        /**
         * Load Product from stream of events
         */
        $product = $this->repository->retrieve($productId);

        /**
         * Trigger Add Product
         */
        $product->addProduct($command->getCode(), $command->getName());

        /**
         * Persist the events
         */
        $this->repository->persist($product);
    }
}