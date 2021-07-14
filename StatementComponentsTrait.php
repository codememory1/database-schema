<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\Creators\SelectCreator;
use Codememory\Components\Database\Schema\Creators\WhereCreator;
use Codememory\Support\Str;

/**
 * Trait StatementComponentsTrait
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
trait StatementComponentsTrait
{

    /**
     * @param callable $callback
     *
     * @return SelectCreator
     */
    public function where(callable $callback): static
    {

        $whereCreator = new WhereCreator();

        call_user_func($callback, $whereCreator);

        return $this->addCommand('where', [$whereCreator->getCollector()->collect()->get()]);

    }

    /**
     * @param array $columns
     * @param bool  $rollup
     *
     * @return StatementComponentsTrait
     */
    public function groupBy(array $columns, bool $rollup = false): static
    {

        $columns = array_map(function (mixed $value) {
            return $this->autoWrapInQuotes($value);
        }, $columns);

        $this->addCommand('group by', [implode(',', $columns)]);

        if ($rollup) {
            $this->addCommand('with rollup');
        }

        return $this;

    }

    /**
     * @param callable $callback
     *
     * @return StatementComponentsTrait
     */
    public function having(callable $callback): static
    {

        $whereCreator = new WhereCreator();

        call_user_func($callback, $whereCreator);

        return $this->addCommand('having', [$whereCreator->getCollector()->collect()->get()]);

    }

    /**
     * @param array          $columns
     * @param array|string[] $attributes
     *
     * @return StatementComponentsTrait
     */
    public function orderBy(array $columns, array $attributes = ['desc']): static
    {

        $orderBy = [];
        $this->addCommand('order by');

        foreach ($columns as $index => $column) {
            $attribute = $attributes[$index] ?? $attributes[array_key_last($attributes)];

            $orderBy[] = sprintf('%s %s', $this->autoWrapInQuotes($column), Str::toUppercase($attribute));
        }

        $this->addCommand(null, [implode(',', $orderBy)]);

        return $this;

    }

    /**
     * @param int      $from
     * @param int|null $before
     *
     * @return StatementComponentsTrait
     */
    public function limit(int $from, ?int $before = null): static
    {

        $this->addCommand('limit', [$from]);

        if (null !== $before) {
            $this->addCommand('offset', [$before]);
        }

        return $this;

    }

    /**
     * @param array         $tables
     * @param callable|null $specification
     *
     * @return StatementComponentsTrait
     */
    public function innerJoin(array $tables, ?callable $specification): static
    {

        $this->join('inner join', $tables, $specification);

        return $this;

    }

    /**
     * @param array         $tables
     * @param callable|null $specification
     *
     * @return StatementComponentsTrait
     */
    public function leftJoin(array $tables, ?callable $specification): static
    {

        $this->join('left join', $tables, $specification);

        return $this;

    }

    /**
     * @param array         $tables
     * @param callable|null $specification
     *
     * @return StatementComponentsTrait
     */
    public function rightJoin(array $tables, ?callable $specification): static
    {

        $this->join('right join', $tables, $specification);

        return $this;

    }

}