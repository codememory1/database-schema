<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface CollectorInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface CollectorInterface
{

    /**
     * @return array
     */
    public function getCollectedResult(): array;

    /**
     * @return string
     */
    public function __toString(): string;

}