<?php

declare(strict_types=1);

namespace Domain\Product\Entities;

use EventSauce\EventSourcing\AggregateRoot;
use EventSauce\EventSourcing\AggregateRootBehaviour;

class Product implements AggregateRoot
{
    use AggregateRootBehaviour;

    /**
     * @return void
     */
    public function addProduct(): void
    {
        $this->recordThat();
    }
}