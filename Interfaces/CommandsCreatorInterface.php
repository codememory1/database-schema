<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface CommandsCreatorInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface CommandsCreatorInterface
{

    /**
     * @return array
     */
    public function getCommands(): array;

}