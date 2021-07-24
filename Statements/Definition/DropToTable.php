<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class DropToTable
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class DropToTable extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'ALTER';

    /**
     * @param string $tableName
     *
     * @return DropToTable
     */
    public function table(string $tableName): DropToTable
    {

        $this->addCommand('table', [$this->autoWrapAsReserved($tableName)]);

        return $this;

    }

    /**
     * @param string $columnName
     *
     * @return DropToTable
     */
    public function dropColumn(string $columnName): DropToTable
    {

        $this->addCommand('drop column', [$this->autoWrapAsReserved($columnName)]);

        return $this;

    }

    /**
     * @param string $indexName
     *
     * @return DropToTable
     */
    public function dropIndex(string $indexName): DropToTable
    {

        $this->addCommand('drop index', [$this->autoWrapAsReserved($indexName)]);

        return $this;

    }

    /**
     * @param string $keyName
     *
     * @return DropToTable
     */
    public function dropKey(string $keyName): DropToTable
    {

        $this->addCommand('drop key', [$this->autoWrapAsReserved($keyName)]);

        return $this;

    }

    /**
     * @param string $constraintName
     *
     * @return DropToTable
     */
    public function dropForeign(string $constraintName): DropToTable
    {

        $this->addCommand('drop foreign key', [$this->autoWrapAsReserved($constraintName)]);

        return $this;

    }

    /**
     * @param string $constraintName
     *
     * @return DropToTable
     */
    public function dropConstraint(string $constraintName): DropToTable
    {

        $this->addCommand('drop constraint', [$this->autoWrapAsReserved($constraintName)]);

        return $this;

    }

}