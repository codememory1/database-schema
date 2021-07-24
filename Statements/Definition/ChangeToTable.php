<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Components\Database\Schema\Collectors\ColumnCollector;
use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Support\Str;

/**
 * Class ChangeToTable
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class ChangeToTable extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'ALTER';

    /**
     * @param string $tableName
     *
     * @return ChangeToTable
     */
    public function table(string $tableName): ChangeToTable
    {

        $this->addCommand('table', [$this->autoWrapAsReserved($tableName)]);

        return $this;

    }

    /**
     * @param string          $oldColumnName
     * @param ColumnInterface $column
     *
     * @return ChangeToTable
     */
    public function changeColumn(string $oldColumnName, ColumnInterface $column): ChangeToTable
    {

        $this->addCommand('change column', [
            sprintf('%s %s', $this->autoWrapAsReserved($oldColumnName), new ColumnCollector($column))
        ]);

        return $this;

    }

    /**
     * @param ColumnInterface $column
     *
     * @return ChangeToTable
     */
    public function modifyColumn(ColumnInterface $column): ChangeToTable
    {

        $this->addCommand('modify column', [new ColumnCollector($column)]);

        return $this;

    }

    /**
     * @param array  $columns
     * @param string $type
     *
     * @return ChangeToTable
     */
    public function orderByColumns(array $columns, string $type = 'asc'): ChangeToTable
    {

        $columns = array_map(function (mixed $column) {
            return $this->autoWrapAsReserved((string) $column);
        }, $columns);

        $this->addCommand('ORDER BY', [
            sprintf('%s %s', implode(',', $columns), Str::toUppercase($type))
        ]);

        return $this;

    }

}