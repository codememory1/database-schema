<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface GroupInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface GroupInterface
{

    /**
     * @param string ...$columns
     *
     * @return GroupInterface
     */
    public function columns(string ...$columns): GroupInterface;

    /**
     * @return GroupInterface
     */
    public function withRollup(): GroupInterface;

}