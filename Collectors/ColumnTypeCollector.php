<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\ColumnDefinition;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;

/**
 * Class ColumnTypeCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class ColumnTypeCollector implements CollectorInterface
{

    /**
     * @var ColumnDefinition
     */
    private ColumnDefinition $columnDefinition;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * ColumnTypeCollector constructor.
     *
     * @param ColumnDefinition $columnDefinition
     */
    public function __construct(ColumnDefinition $columnDefinition)
    {

        $this->columnDefinition = $columnDefinition;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $type = $this->columnDefinition->getType();
        $parameters = implode(',', $this->columnDefinition->getParameters());
        $values = implode(',', array_map(function (mixed $value) {
            return sprintf('\'%s\'', $value);
        }, $this->columnDefinition->getValues()));

        if(null !== $parameters || null !== $values) {
            $type .= sprintf('(%s)', $parameters.$values);
        }

        $this->collectorResult = $type;

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