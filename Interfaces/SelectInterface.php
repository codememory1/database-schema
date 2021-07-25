<?php

namespace Codememory\Components\Database\Schema\Interfaces;

use Codememory\Components\Database\Schema\StatementComponents\Expression;
use Codememory\Components\Database\Schema\StatementComponents\Group;
use Codememory\Components\Database\Schema\StatementComponents\Join;
use Codememory\Components\Database\Schema\StatementComponents\Order;

/**
 * Interface SelectInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface SelectInterface
{

    /**
     * @return SelectInterface
     */
    public function select(): SelectInterface;

    /**
     * @param array $columns
     *
     * @return SelectInterface
     */
    public function columns(array $columns = []): SelectInterface;

    /**
     * @return SelectInterface
     */
    public function all(): SelectInterface;

    /**
     * @return SelectInterface
     */
    public function distinct(): SelectInterface;

    /**
     * @return SelectInterface
     */
    public function distinctrow(): SelectInterface;

    /**
     * @param string      $table
     * @param string|null $alias
     *
     * @return SelectInterface
     */
    public function from(string $table, ?string $alias = null): SelectInterface;

    /**
     * @return SelectInterface
     */
    public function union(): SelectInterface;

    /**
     * @param Expression $expression
     *
     * @return static
     */
    public function where(Expression $expression): static;

    /**
     * @param Group $group
     *
     * @return static
     */
    public function groupBy(Group $group): static;

    /**
     * @param Expression $expression
     *
     * @return static
     */
    public function having(Expression $expression): static;

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