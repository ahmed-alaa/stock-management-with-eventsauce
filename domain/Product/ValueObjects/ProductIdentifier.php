<?php

declare(strict_types=1);

namespace Domain\Product\ValueObjects;

use EventSauce\EventSourcing\AggregateRootId;
use Ramsey\Uuid\Uuid;

/**
 * Class ProductIdentifier
 * @package Domain\Product\Entities
 */
class ProductIdentifier implements AggregateRootId
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * ProductIdentifier constructor.
     *
     * @param string $identifier
     */
    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->identifier;
    }

    /**
     * @param string $aggregateRootId
     *
     * @return static
     */
    public static function fromString(string $aggregateRootId): AggregateRootId
    {
        return new self($aggregateRootId);
    }

    /**
     * @return AggregateRootId
     * @throws \Exception
     */
    public static function generate(): AggregateRootId
    {
        return new self(Uuid::uuid4()->toString());
    }
}