<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Support\Str;

/**
 * Class DropIndex
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class DropIndex extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'DROP';

    /**
     * @param string $indexName
     *
     * @return $this
     */
    public function index(string $indexName): DropIndex
    {

        $this->addCommand('index', [$this->autoWrapAsReserved($indexName)]);

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return $this
     */
    public function on(string $tableName): DropIndex
    {

        $this->addCommand('on', [$this->autoWrapAsReserved($tableName)]);

        return $this;

    }

    /**
     * @param string $algorithm
     *
     * @return $this
     */
    public function algorithm(string $algorithm): DropIndex
    {

        $this->addCommand('algorithm', [Str::toUppercase($algorithm)]);

        return $this;

    }

    /**
     * @param string $lock
     *
     * @return $this
     */
    public function lock(string $lock): DropIndex
    {

        $this->addCommand('lock', [Str::toUppercase($lock)]);

        return $this;

    }

}