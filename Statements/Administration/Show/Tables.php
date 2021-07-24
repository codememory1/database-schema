<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Tables
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Tables extends AbstractShow
{

    /**
     * @return Tables
     */
    public function tables(): Tables
    {

        $this->commands[] = 'TABLES';

        return $this;

    }

    /**
     * @return Tables
     */
    public function extended(): Tables
    {

        $this->commands[] = 'EXTENDED';

        return $this;

    }

    /**
     * @return Tables
     */
    public function full(): Tables
    {

        $this->commands[] = 'FULL';

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return Tables
     */
    public function from(string $dbname): Tables
    {

        $this->commands[] = sprintf('FROM %s', $this->autoWrapAsReserved($dbname));

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return Tables
     */
    public function in(string $dbname): Tables
    {

        $this->commands[] = sprintf('IN %s', $this->autoWrapAsReserved($dbname));

        return $this;

    }

}