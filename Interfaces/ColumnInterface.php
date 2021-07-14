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
     * @param string $columnName
     *
     * @return ColumnTypeInterface
     */
    public function initColumn(string $columnName): ColumnTypeInterface;


}