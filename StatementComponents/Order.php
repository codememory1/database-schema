<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Support\Str;

/**
 * Class Order
 *
 * @package Codememory\Components\Database\Schema\StatementComponents
 *
 * @author  Codememory
 */
class Order
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param array|string $columns
     * @param array|string $types
     *
     * @return Order
     */
    public function columns(array|string $columns, array|string $types = 'asc'): Order
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
     * @return Order
     */
    public function withRollup(): Order
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