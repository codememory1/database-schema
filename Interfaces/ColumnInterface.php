<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ColumnInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ColumnInterface
{

    /**
     * @return ColumnsKitInterface
     */
    public function kit(): ColumnsKitInterface;

    /**
     * @param string   $name
     * @param callable $callback
     *
     * @return ColumnInterface
     */
    public function create(string $name, callable $callback): ColumnInterface;

}