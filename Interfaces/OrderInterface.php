<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface OrderInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface OrderInterface
{

    /**
     * @param array|string $columns
     * @param array|string $types
     *
     * @return OrderInterface
     */
    public function columns(array|string $columns, array|string $types = 'asc'): OrderInterface;

    /**
     * @return OrderInterface
     */
    public function withRollup(): OrderInterface;

}