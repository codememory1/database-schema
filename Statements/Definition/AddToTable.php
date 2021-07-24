<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Components\Database\Schema\Collectors\ColumnCollector;
use Codememory\Components\Database\Schema\Collectors\ReferenceCollector;
use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Components\Database\Schema\Interfaces\ReferenceInterface;

/**
 * Class AddToTable
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class AddToTable extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'ALTER';

    /**
     * @param string $tableName
     *
     * @return AddToTable
     */
    public function table(string $tableName): AddToTable
    {

        $this->addCommand('table', [$this->autoWrapAsReserved($tableName)]);

        return $this;

    }

    /**
     * @param string $symbol
     *
     * @return AddToTable
     */
    public function constraint(string $symbol): AddToTable
    {

        $this->addCommand('constraint', [$symbol]);

        return $this;

    }

    /**
     * @param ColumnInterface $column
     *
     * @return AddToTable
     */
    public function addColumn(ColumnInterface $column): AddToTable
    {

        $this->addCommand('add column', [new ColumnCollector($column)]);

        return $this;

    }

    /**
     * @param ColumnInterface $column
     *
     * @return AddToTable
     */
    public function addMultipleColumn(ColumnInterface $column): AddToTable
    {

        $this->addCommand('add column', [sprintf('(%s)', new ColumnCollector($column))]);

        return $this;

    }

    /**
     * @param ReferenceInterface $reference
     *
     * @return AddToTable
     */
    public function addReference(ReferenceInterface $reference): AddToTable
    {

        $this->addCommand('add', [new ReferenceCollector($reference)]);

        return $this;

    }

    /**
     * @param string $indexName
     *
     * @return AddToTable
     */
    public function addIndex(string $indexName): AddToTable
    {

        $this->addCommand('add index', [$indexName]);

        return $this;

    }

    /**
     * @param string $keyName
     *
     * @return AddToTable
     */
    public function addKey(string $keyName): AddToTable
    {

        $this->addCommand('add key', [$keyName]);

        return $this;

    }

    /**
     * @param string $columnName
     *
     * @return AddToTable
     */
    public function addPrimary(string $columnName): AddToTable
    {

        $this->addCommand('add primary KEY', [sprintf('(%s)', $this->autoWrapAsReserved($columnName))]);

        return $this;

    }

    /**
     * @param string $columnName
     *
     * @return AddToTable
     */
    public function addUnique(string $columnName): AddToTable
    {

        $this->addCommand('add unique', [sprintf('(%s)', $this->autoWrapAsReserved($columnName))]);

        return $this;

    }

}