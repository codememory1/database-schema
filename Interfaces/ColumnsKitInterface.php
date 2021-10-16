<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ColumnsKitInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ColumnsKitInterface
{

    /**
     * @return void
     */
    public function id(): void;

    /**
     * @return void
     */
    public function timestamps(): void;

}