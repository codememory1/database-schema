<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Creators\TableCreator;

/**
 * Class TableCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class TableCollector implements CollectorInterface
{

    /**
     * @var TableCreator
     */
    private TableCreator $tableCreator;

    /**
     * @var null|ColumnCollector
     */
    private ?ColumnCollector $columnCollector;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * TableCollector constructor.
     *
     * @param TableCreator         $tableCreator
     * @param ColumnCollector|null $columnCollector
     */
    public function __construct(TableCreator $tableCreator, ?ColumnCollector $columnCollector)
    {

        $this->tableCreator = $tableCreator;
        $this->columnCollector = $columnCollector;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        if (null !== $this->columnCollector) {
            $this->collectorResult = sprintf('(%s) ', $this->columnCollector->collect()->get());
        }

        $this->collectorResult .= sprintf(
            'ENGINE = %s CHARACTER SET %s COLLATE %s',
            $this->tableCreator->getEngine(),
            $this->tableCreator->getCharset(),
            $this->tableCreator->getCollate()
        );

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function get(): ?string
    {

        return $this->collectorResult;

    }

}