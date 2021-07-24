<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Engines
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Engines extends AbstractShow
{

    /**
     * @return Engines
     */
    public function engines(): Engines
    {

        $this->commands[] = 'ENGINES';

        return $this;

    }

    /**
     * @return Engines
     */
    public function storage(): Engines
    {

        $this->commands[] = 'STORAGE';

        return $this;

    }

}