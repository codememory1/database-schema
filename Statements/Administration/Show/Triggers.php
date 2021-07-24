<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Triggers
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Triggers extends AbstractShow
{

    /**
     * @return Triggers
     */
    public function triggers(): Triggers
    {

        $this->commands[] = 'TRIGGERS';

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return Triggers
     */
    public function from(string $dbname): Triggers
    {

        $this->commands[] = sprintf('FROM %s', $this->autoWrapAsReserved($dbname));

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return Triggers
     */
    public function in(string $dbname): Triggers
    {

        $this->commands[] = sprintf('IN %s', $this->autoWrapAsReserved($dbname));

        return $this;

    }

}