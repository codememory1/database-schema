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
     * @param string $name
     *
     * @return ColumnTypeInterface
     */
    public function setColumnName(string $name): ColumnTypeInterface;

}