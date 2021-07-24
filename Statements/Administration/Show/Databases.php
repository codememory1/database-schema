<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Databases
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Databases extends AbstractShow
{

    /**
     * @return Databases
     */
    public function databases(): Databases
    {

        $this->commands[] = 'DATABASES';

        return $this;

    }

    /**
     * @return Databases
     */
    public function schemas(): Databases
    {

        $this->commands[] = 'SCHEMAS';

        return $this;

    }

}