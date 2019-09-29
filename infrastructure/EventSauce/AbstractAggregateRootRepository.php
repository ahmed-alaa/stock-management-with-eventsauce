<?php

namespace Infrastructure\EventSauce;

use EventSauce\EventSourcing\AggregateRootId;
use EventSauce\EventSourcing\ConstructingAggregateRootRepository;
use EventSauce\EventSourcing\Consumer;
use EventSauce\EventSourcing\MessageDecorator;
use EventSauce\EventSourcing\MessageRepository;
use EventSauce\EventSourcing\SynchronousMessageDispatcher;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

/**
 * Class AbstractAggregateRootRepository
 * @package Infrastructure\EventSauce
 */
class AbstractAggregateRootRepository
{
    /**
     * @var string
     */
    protected $tableName;
    /**
     * @var string
     */
    protected $aggregateRootClass;

    /**
     * @var array
     */
    protected $consumers = [];

    /**
     * @var MessageDecorator|null
     */
    protected $messageDecorator = null;

    /**
     * @var ConstructingAggregateRootRepository
     */
    private $constructingAggregateRootRepository;

    /**
     * AbstractAggregateRootRepository constructor.
     */
    public function __construct()
    {
        $this->constructingAggregateRootRepository = new ConstructingAggregateRootRepository(
            $this->aggregateRootClass,
            $this->getMessageRepository(),
            new SynchronousMessageDispatcher(...$this->getInstanciatedConsumers()),
            $this->getMessageDecorator()
        );
    }

    /**
     * @param AggregateRootId $aggregateRootId
     * @return object
     */
    public function retrieve(AggregateRootId $aggregateRootId): object
    {
        return $this->constructingAggregateRootRepository->retrieve($aggregateRootId);
    }

    /**
     * @param object $aggregateRoot
     */
    public function persist(object $aggregateRoot)
    {
        return $this->constructingAggregateRootRepository->persist($aggregateRoot);
    }

    /**
     * @param AggregateRootId $aggregateRootId
     * @param int $aggregateRootVersion
     * @param object ...$events
     */
    public function persistEvents(AggregateRootId $aggregateRootId, int $aggregateRootVersion, object ...$events)
    {
        $this->constructingAggregateRootRepository->persistEvents($aggregateRootId, $aggregateRootVersion);
    }

    /**
     * @return MessageRepository
     */
    private function getMessageRepository(): MessageRepository
    {
        return app()->makeWith(LaravelMessageRepository::class, [
            'connection' => $this->getConnection(),
            'tableName' => $this->tableName,
        ]);
    }

    /**
     * @return Connection
     */
    private function getConnection(): Connection
    {
        $connectionName = $this->connectionName
            ?? config('database.default');

        return DB::connection($connectionName);
    }

    /**
     * @return array
     */
    private function getInstanciatedConsumers(): array
    {
        return $this->instanciate($this->consumers);
    }

    /**
     * @return MessageDecorator|null
     */
    protected function getMessageDecorator(): ?MessageDecorator
    {
        return $this->messageDecorator;
    }

    /**
     * @param array $classes
     * @return array
     */
    private function instanciate(array $classes): array
    {
        return array_map(function ($class): Consumer {
            return is_string($class)
                ? app($class)
                : $class;
        }, $classes);
    }
}