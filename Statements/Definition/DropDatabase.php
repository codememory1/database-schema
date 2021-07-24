<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class DropDatabase
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class DropDatabase extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'DROP';

    /**
     * @param string $dbname
     *
     * @return $this
     */
    public function database(string $dbname): DropDatabase
    {

        $this->addCommand('database if exists', [$this->autoWrapAsReserved($dbname)]);

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return $this
     */
    public function schema(string $dbname): DropDatabase
    {

        $this->addCommand('schema if exists', [$this->autoWrapAsReserved($dbname)]);

        return $this;

    }

}