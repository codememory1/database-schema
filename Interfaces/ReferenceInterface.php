<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ReferenceInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ReferenceInterface
{

    /**
     * @param callable $callback
     *
     * @return ReferenceInterface
     */
    public function add(callable $callback): ReferenceInterface;

}