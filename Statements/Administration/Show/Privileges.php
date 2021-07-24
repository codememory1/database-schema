<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Privileges
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Privileges extends AbstractShow
{

    /**
     * @return Privileges
     */
    public function privileges(): Privileges
    {

        $this->commands[] = 'PRIVILEGES';

        return $this;

    }

}