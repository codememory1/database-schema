<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface CreatorInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface CreatorInterface
{

    /**
     * @return CollectorInterface
     */
    public function getCollector(): CollectorInterface;

}