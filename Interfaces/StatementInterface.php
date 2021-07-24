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
     * @return string|null
     */
    public function getQuery(): ?string;

}