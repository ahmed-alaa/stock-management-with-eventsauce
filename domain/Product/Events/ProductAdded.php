<?php

namespace Domain\Product\Events;

use Domain\Product\ValueObjects\ProductCode;
use Domain\Product\ValueObjects\ProductName;
use EventSauce\EventSourcing\Serialization\SerializablePayload;

/**
 * Class ProductAdded
 * @package Domain\Product\Events
 */
final class ProductAdded implements SerializablePayload
{
    /**
     * @var ProductCode
     */
    private $code;

    /**
     * @var ProductName
     */
    private $name;

    public function __construct(ProductCode $code, ProductName $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function toPayload(): array
    {
        return [
            'product_code' => $this->code,
            'product_name' => $this->name,
        ];
    }

    /**
     * @param array $payload
     * @return SerializablePayload
     */
    public static function fromPayload(array $payload): SerializablePayload
    {
        return new self($payload['code'], $payload['name']);
    }
}