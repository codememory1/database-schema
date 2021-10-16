<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface DropTableInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface DropTableInterface
{

    /**
     * @return DropTableInterface
     */
    public function isTemp(): DropTableInterface;

    /**
     * @return DropTableInterface
     */
    public function withRestrict(): DropTableInterface;

    /**
     * @return DropTableInterface
     */
    public function withCascade(): DropTableInterface;

}