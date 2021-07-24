<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Variables
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Variables extends AbstractShow
{

    /**
     * @return Variables
     */
    public function variables(): Variables
    {

        $this->commands[] = 'VARIABLES';

        return $this;

    }

    /**
     * @return Variables
     */
    public function globalV(): Variables
    {

        $this->commands[] = 'GLOBAL';

        return $this;

    }

    /**
     * @return Variables
     */
    public function session(): Variables
    {

        $this->commands[] = 'SESSION';

        return $this;

    }

}