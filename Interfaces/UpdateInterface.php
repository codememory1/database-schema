<?php

namespace Codememory\Components\Database\Schema\Interfaces;

use Codememory\Components\Database\Schema\StatementComponents\Expression;
use Codememory\Components\Database\Schema\StatementComponents\Join;
use Codememory\Components\Database\Schema\StatementComponents\Order;

/**
 * Interface UpdateInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface UpdateInterface
{

    /**
     * @return UpdateInterface
     */
    public function update(): UpdateInterface;

    /**
     * @param array $tables
     *
     * @return UpdateInterface
     */
    public function tables(array $tables): UpdateInterface;

    /**
     * @param array $columns
     * @param array $values
     *
     * @return UpdateInterface
     */
    public function setData(array $columns, array $values): UpdateInterface;

    /**
     * @param Expression $expression
     *
     * @return static
     */
    public function where(Expression $expression): static;

    /**
     * @param Join $join
     *
     * @return static
     */
    public function join(Join $join): static;

    /**
     * @param int      $from
     * @param int|null $before
     *
     * @return static
     */
    public function limit(int $from, ?int $before = null): static;

    /**
     * @param Order $order
     *
     * @return static
     */
    public function orderBy(Order $order): static;

}