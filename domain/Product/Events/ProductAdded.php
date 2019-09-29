<?php

namespace Domain\Product\Events;

use EventSauce\EventSourcing\Serialization\SerializablePayload;

final class ProductAdded implements SerializablePayload
{

    public function toPayload(): array
    {
        // TODO: Implement toPayload() method.
    }

    public static function fromPayload(array $payload): SerializablePayload
    {
        // TODO: Implement fromPayload() method.
    }
}