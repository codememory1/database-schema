<?php

namespace Codememory\Components\Database\Schema\Interfaces;

use Codememory\Components\Database\Schema\Creators\WhereCreator;
use Codememory\Components\Database\Schema\Parameters\JoinParameters;

/**
 * Interface JoinParametersInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface JoinParametersInterface
{

    /**
     * @param WhereCreator $whereCreator
     *
     * @return JoinParametersInterface
     */
    public function on(WhereCreator $whereCreator): JoinParametersInterface;

    /**
     * @param array $columns
     *
     * @return JoinParametersInterface
     */
    public function using(array $columns): JoinParametersInterface;

}