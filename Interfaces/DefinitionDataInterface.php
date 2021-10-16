<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface DefinitionDataInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface DefinitionDataInterface
{

    /**
     * @return array
     */
    public function getSQLData(): array;

}