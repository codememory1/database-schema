<?php

namespace Codememory\Components\Database\Schema\Interfaces;

use Codememory\Components\Database\Schema\StatementComponents\Expression;
use Codememory\Components\Database\Schema\StatementComponents\Join;
use Codememory\Components\Database\Schema\StatementComponents\Order;

/**
 * Interface DeleteInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface DeleteInterface
{

    /**
     * @return DeleteInterface
     */
    public function delete(): DeleteInterface;

    /**
     * @return DeleteInterface
     */
    public function lowPriority(): DeleteInterface;

    /**
     * @return DeleteInterface
     */
    public function quick(): DeleteInterface;

    /**
     * @return DeleteInterface
     */
    public function ignore(): DeleteInterface;

    /**
     * @param array $tables
     *
     * @return DeleteInterface
     */
    public function from(array $tables): DeleteInterface;

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