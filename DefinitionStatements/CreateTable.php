<?php

namespace Codememory\Components\Database\Schema\DefinitionStatements;

use Codememory\Components\Database\Schema\Definitions\Column;
use Codememory\Components\Database\Schema\Interfaces\CreateTableInterface;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;
use JetBrains\PhpStorm\Pure;

/**
 * Class CreateTable
 *
 * @package Codememory\Components\Database\Schema\Definitions
 *
 * @author  Codememory
 */
class CreateTable implements CreateTableInterface
{

    /**
     * @var Table
     */
    private Table $table;

    /**
     * @param Table $table
     */
    public function __construct(Table $table)
    {

        $this->table = $table;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getTableName(): string
    {

        return $this->table->getName();

    }

    /**
     * @inheritDoc
     */
    public function isTemp(): CreateTableInterface
    {

        $this->table->addOption('temporary', true);

        return $this;

    }

    /**
     * @inheritDoc
     * @throws SchemaException
     */
    public function addColumns(callable $callback): CreateTableInterface
    {

        $column = new Column();

        call_user_func($callback, $column);

        foreach ($column->getSQLData() as $column) {
            $columnDefinition = $column['definition']->getSQLData();

            /** @var Type $columnType */
            $columnType = $columnDefinition['type'];
            $columnOptions = $columnDefinition['options']?->getSQLData();
            $addedColumn = $this->table->addColumn($column['name'], $columnType->getName());

            if (null !== $columnDefinition['length']) {
                $addedColumn->setLength($columnDefinition['length']);
            }

            if (null !== $columnOptions) {
                if (array_key_exists('precision', $columnOptions)) {
                    $addedColumn->setPrecision($columnOptions['precision']);
                }

                if (array_key_exists('scale', $columnOptions)) {
                    $addedColumn->setScale($columnOptions['scale']);
                }

                if (array_key_exists('unsigned', $columnOptions)) {
                    $addedColumn->setUnsigned($columnOptions['unsigned']);
                }

                if (array_key_exists('fixed', $columnOptions)) {
                    $addedColumn->setFixed($columnOptions['fixed']);
                }

                if (array_key_exists('nullable', $columnOptions)) {
                    $addedColumn->setNotnull(false === $columnOptions['nullable']);
                }

                if (array_key_exists('default', $columnOptions)) {
                    $addedColumn->setDefault($columnOptions['default']);
                }

                if (array_key_exists('autoincrement', $columnOptions)) {
                    $addedColumn->setAutoincrement($columnOptions['autoincrement']);
                }

                if (array_key_exists('primary', $columnOptions)) {
                    $this->table->setPrimaryKey([$column['name']], $columnOptions['primaryIndexName']);
                }

                if (array_key_exists('primary', $columnOptions)) {
                    $this->setComment($columnOptions['comment']);
                }

                if (array_key_exists('foreign', $columnOptions)) {
                    $foreign = $columnOptions['foreign']->getSQLData();

                    $this->table->addForeignKeyConstraint(
                        $foreign['table'],
                        [$foreign['localColumn']],
                        [$foreign['foreignColumn']],
                        $foreign['options'],
                        $foreign['constraint']
                    );
                }
            }

        }

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function setEngine(string $engine): CreateTableInterface
    {

        $this->table->addOption('engine', $engine);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function setComment(string $comment): CreateTableInterface
    {

        $this->table->setComment($comment);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function setCharset(string $charset): CreateTableInterface
    {

        $this->table->addOption('charset', $charset);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function setCollate(string $collate): CreateTableInterface
    {

        $this->table->addOption('collate', $collate);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function setCharsetByCollate(string $collate): CreateTableInterface
    {

        [$charset] = explode('_', $collate, 2);

        $this->table->addOption('charset', $charset);
        $this->table->addOption('collate', $collate);

        return $this;

    }

    /**
     * @return Table
     */
    public function getTable(): Table
    {

        return $this->table;

    }

}