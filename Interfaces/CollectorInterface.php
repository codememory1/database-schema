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
     * @return CollectorInterface
     */
    public function collect(): CollectorInterface;

    /**
     * @return string|null
     */
    public function get(): ?string;

}