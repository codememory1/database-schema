<?php

namespace Codememory\Components\Database\Schema\Schemes;

use Codememory\Components\Database\Schema\Collectors\ColumnCollector;
use Codememory\Components\Database\Schema\Collectors\ReferencesCollector;
use Codememory\Components\Database\Schema\Creators\ColumnCreator;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\References;

/**
 * Class ColumnSchema
 *
 * @package Codememory\Components\Database\Schema\Schemes
 *
 * @author  Codememory
 */
class ColumnSchema extends AbstractSchema
{

    use ValueWrapperTrait;

    /**
     * @var string
     */
    private string $tableName;

    /**
     * ColumnSchema constructor.
     *
     * @param string $tableName
     */
    public function __construct(string $tableName)
    {

        $this->tableName = $tableName;

    }

    /**
     * @param string $oldColumnName
     * @param string $newColumnName
     *
     * @return ColumnSchema
     */
    public function rename(string $oldColumnName, string $newColumnName): ColumnSchema
    {

        $this->addCommand('alter table', [
            $this->autoWrapInQuotes($this->tableName),
            'RENAME COLUMN',
            $this->autoWrapInQuotes($oldColumnName),
            'TO',
            $this->autoWrapInQuotes($newColumnName),
        ]);

        return $this;

    }

    /**
     * @param string $columnName
     *
     * @return ColumnSchema
     */
    public function drop(string $columnName): ColumnSchema
    {

        $this->addCommand('alter table', [
            $this->autoWrapInQuotes($this->tableName),
            'DROP COLUMN',
            $this->autoWrapInQuotes($columnName)
        ]);

        return $this;

    }

    /**
     * @param callable $callback
     *
     * @return ColumnSchema
     */
    public function add(callable $callback): ColumnSchema
    {

        $columnCreator = new ColumnCreator();

        call_user_func($callback, $columnCreator);

        $columnCollector = new ColumnCollector($columnCreator);

        $this->addCommand('alter table', [
            $this->autoWrapInQuotes($this->tableName),
            'ADD COLUMN',
            $columnCollector->collect()->get()
        ]);

        return $this;

    }

    /**
     * @param callable $callback
     *
     * @return ColumnSchema
     */
    public function addForeign(callable $callback): ColumnSchema
    {

        $references = new References();

        call_user_func($callback, $references);

        $referencesCollector = new ReferencesCollector($references);

        $this->addCommand('alter table', [
            $this->autoWrapInQuotes($this->tableName),
            'ADD',
            $referencesCollector->collect()->get()
        ]);

        return $this;

    }

    /**
     * @param string $columnName
     *
     * @return ColumnSchema
     */
    public function dropPrimaryKey(string $columnName): ColumnSchema
    {

        $this->addCommand('alter table', [
            $this->autoWrapInQuotes($this->tableName),
            'DROP PRIMARY KEY',
            $this->autoWrapInQuotes($columnName)
        ]);

        return $this;

    }

    /**
     * @param callable $callback
     *
     * @return ColumnSchema
     */
    public function modify(callable $callback): ColumnSchema
    {

        $columnCreator = new ColumnCreator();

        call_user_func($callback, $columnCreator);

        $columnCollector = new ColumnCollector($columnCreator);

        $this->addCommand('alter table', [
            $this->autoWrapInQuotes($this->tableName),
            'MODIFY',
            $columnCollector->collect()->get()
        ]);

        return $this;

    }

}