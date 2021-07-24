<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Collation
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Collation extends AbstractShow
{
    
    /**
     * @return Collation
     */
    public function collation(): Collation
    {

        $this->commands[] = 'COLLATION';

        return $this;

    }

}