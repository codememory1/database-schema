<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface StatementInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface StatementInterface
{

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Returns a sql statement
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @return string|null
     */
    public function getQuery(): ?string;

}