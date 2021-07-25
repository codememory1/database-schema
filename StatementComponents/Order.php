<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\OrderInterface;
use Codememory\Support\Str;

/**
 * Class Order
 *
 * @package Codememory\Components\Database\Schema\StatementComponents
 *
 * @author  Codememory
 */
class Order implements OrderInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function columns(array|string $columns, array|string $types = 'asc'): OrderInterface
    {

        $columns = is_string($columns) ? [$columns] : $columns;
        $types = is_string($types) ? [$types] : $types;
        $collectedOrder = [];

        foreach ($columns as $index => $column) {
            $type = array_key_exists($index, $types) ? $types[$index] : $types[array_key_last($types)];

            $collectedOrder[] = sprintf('%s %s', $this->autoWrapAsReserved($column), Str::toUppercase($type));
        }

        $this->commands[] = implode(',', $collectedOrder);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function withRollup(): OrderInterface
    {

        $this->commands[] = 'WITH ROLLUP';

        return $this;

    }

    /**
     * @return array
     */
    public function getCommands(): array
    {

        return $this->commands;

    }

}