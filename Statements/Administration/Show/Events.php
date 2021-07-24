<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Events
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Events extends AbstractShow
{

    /**
     * @return Events
     */
    public function events(): Events
    {

        $this->commands[] = 'EVENTS';

        return $this;

    }

    /**
     * @param string $schemaName
     *
     * @return Events
     */
    public function from(string $schemaName): Events
    {

        $this->commands[] = sprintf('FROM %s', $this->autoWrapAsReserved($schemaName));

        return $this;

    }

    /**
     * @param string $schemaName
     *
     * @return Events
     */
    public function in(string $schemaName): Events
    {

        $this->commands[] = sprintf('IN %s', $this->autoWrapAsReserved($schemaName));

        return $this;

    }

}