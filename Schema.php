<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\Collectors\SchemaCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Schemes\ChangeSchema;
use Codememory\Components\Database\Schema\Schemes\ColumnSchema;
use Codememory\Components\Database\Schema\Schemes\InsertSchema;
use Codememory\Components\Database\Schema\Schemes\SelectSchema;
use Codememory\Components\Database\Schema\Schemes\TableSchema;

/**
 * Class Schema
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class Schema
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    public array $schemes = [];

    /**
     * @var array
     */
    private array $queries = [];

    /**
     * @param string $sql
     *
     * @return Schema
     */
    public function addSql(string $sql): Schema
    {

        $this->queries[] = $sql;

        return $this;

    }

    /**
     * @return TableSchema
     */
    public function table(): TableSchema
    {

        $tableSchema = new TableSchema();

        $this->schemes[] = $tableSchema;

        return $tableSchema;

    }

    /**
     * @param string $tableName
     *
     * @return ColumnSchema
     */
    public function alterColumn(string $tableName): ColumnSchema
    {

        $columnSchema = new ColumnSchema($tableName);

        $this->schemes[] = $columnSchema;

        return $columnSchema;

    }

    /**
     * @return SelectSchema
     */
    public function sampling(): SelectSchema
    {

        $columnSchema = new SelectSchema();

        $this->schemes[] = $columnSchema;

        return $columnSchema;

    }

    /**
     * @return ChangeSchema
     */
    public function change(): ChangeSchema
    {

        $changeSchema = new ChangeSchema();

        $this->schemes[] = $changeSchema;

        return $changeSchema;

    }

    /**
     * @return Schema
     */
    public function collectSchemes(): Schema
    {

        foreach ($this->schemes as $schema) {
            $schemaCollector = new SchemaCollector($schema);

            $this->queries[] = $schemaCollector->collect()->get();
        }

        return $this;

    }

    /**
     * @return array
     */
    public function getQueries(): array
    {

        return $this->queries;

    }

}