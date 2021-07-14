<?php

namespace Codememory\Components\Database\Schema\Schemes;

use Codememory\Components\Database\Schema\Creators\ColumnCreator;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\TableCreatorInterface;
use Codememory\Components\Database\Schema\Creators\TableCreator;
use Codememory\Support\Str;

/**
 * Class TableSchema
 *
 * @package Codememory\Components\Database\Schema\Schemes
 *
 * @author  Codememory
 */
final class TableSchema extends AbstractSchema
{

    use ValueWrapperTrait;

    /**
     * @param string   $tableName
     * @param callable $callback
     *
     * @return TableCreatorInterface
     */
    public function create(string $tableName, callable $callback): TableCreatorInterface
    {

        return $this->tableCreator('create table', $tableName, $callback);

    }

    /**
     * @param string   $tableName
     * @param callable $callback
     *
     * @return TableCreatorInterface
     */
    public function createIfNotExist(string $tableName, callable $callback): TableCreatorInterface
    {

        return $this->tableCreator('create table if not exists', $tableName, $callback);

    }

    /**
     * @param string $tableName
     *
     * @return TableSchema
     */
    public function drop(string $tableName): TableSchema
    {

        $this->addCommand('drop table', [$this->autoWrapInQuotes($tableName)]);

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return TableSchema
     */
    public function dropIfExists(string $tableName): TableSchema
    {

        $this->addCommand('drop table if exists', [$this->autoWrapInQuotes($tableName)]);

        return $this;

    }

    /**
     * @param string $oldTableName
     * @param string $newTableName
     *
     * @return TableSchema
     */
    public function rename(string $oldTableName, string $newTableName): TableSchema
    {

        $this->addCommand('rename table', [
            $this->autoWrapInQuotes($oldTableName),
            Str::toUppercase('to'),
            $this->autoWrapInQuotes($newTableName)
        ]);

        return $this;

    }

    /**
     * @param string   $command
     * @param string   $tableName
     * @param callable $callback
     *
     * @return TableCreatorInterface
     */
    private function tableCreator(string $command, string $tableName, callable $callback): TableCreatorInterface
    {

        $columnCreator = new ColumnCreator();

        call_user_func($callback, $columnCreator);

        $creator = new TableCreator($columnCreator->getCollector());

        $this->addCommand($command, [$this->autoWrapInQuotes($tableName)], $creator);

        return $creator;

    }

}