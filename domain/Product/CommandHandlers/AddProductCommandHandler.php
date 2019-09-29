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
        var_dump($product);die();
        /**
         * Trigger Add Product
         */
        $product->addProduct();
    }
}