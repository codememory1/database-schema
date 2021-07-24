<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\Interfaces\SchemaInterface;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;
use Codememory\Components\Database\Schema\StatementComponents\Column;
use Codememory\Components\Database\Schema\StatementComponents\Reference;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Collation;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Columns;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Databases;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Engines;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Events;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Index;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Privileges;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Tables;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Triggers;
use Codememory\Components\Database\Schema\Statements\Administration\Show\Variables;
use Codememory\Components\Database\Schema\Statements\Definition\AddToTable;
use Codememory\Components\Database\Schema\Statements\Definition\CreateDatabase;
use Codememory\Components\Database\Schema\Statements\Definition\CreateTable;
use Codememory\Components\Database\Schema\Statements\Definition\DropDatabase;
use Codememory\Components\Database\Schema\Statements\Definition\DropTable;
use Codememory\Components\Database\Schema\Statements\Definition\Rename;
use Codememory\Components\Database\Schema\Statements\Manipulation\Delete;
use Codememory\Components\Database\Schema\Statements\Manipulation\Insert;
use Codememory\Components\Database\Schema\Statements\Manipulation\Select;
use Codememory\Components\Database\Schema\Statements\Manipulation\Update;

/**
 * Class Schema
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class Schema implements SchemaInterface
{

    /**
     * @var array
     */
    private array $statements = [];

    /**
     * @var array
     */
    private array $queries = [];

    /**
     * @inheritDoc
     */
    public function select(): Select
    {

        $select = new Select();

        $this->statements[] = $select->select();

        return $select;

    }

    /**
     * @inheritDoc
     */
    public function insert(): Insert
    {

        $insert = new Insert();

        $this->statements[] = $insert->insert();

        return $insert;

    }

    /**
     * @inheritDoc
     */
    public function update(): Update
    {

        $update = new Update();

        $this->statements[] = $update->update();

        return $update;

    }

    /**
     * @inheritDoc
     */
    public function delete(): Delete
    {

        $delete = new Delete();

        $this->statements[] = $delete->delete();

        return $delete;

    }

    /**
     * @inheritDoc
     */
    public function showCollations(): Collation
    {

        $collation = new Collation();

        $this->statements[] = $collation->collation();

        return $collation;

    }

    /**
     * @inheritDoc
     */
    public function showColumns(string $tableName): Columns
    {

        $columns = new Columns();

        $this->statements[] = $columns->columns()->from($tableName);

        return $columns;

    }

    /**
     * @inheritDoc
     */
    public function showFields(string $tableName): Columns
    {

        $columns = new Columns();

        $this->statements[] = $columns->fields()->from($tableName);

        return $columns;

    }

    /**
     * @inheritDoc
     */
    public function showDatabases(): Databases
    {

        $databases = new Databases();

        $this->statements[] = $databases->databases();

        return $databases;

    }

    /**
     * @inheritDoc
     */
    public function showSchema(): Databases
    {

        $databases = new Databases();

        $this->statements[] = $databases->schemas();

        return $databases;

    }

    /**
     * @inheritDoc
     */
    public function showEngines(): Engines
    {

        $engines = new Engines();

        $this->statements[] = $engines->engines();

        return $engines;

    }

    /**
     * @inheritDoc
     */
    public function showEvents(string $schemaName): Events
    {

        $events = new Events();

        $this->statements[] = $events->events()->from($schemaName);

        return $events;

    }

    /**
     * @inheritDoc
     */
    public function showIndex(string $tableName): Index
    {

        $index = new Index();

        $this->statements[] = $index->index()->from($tableName);

        return $index;

    }

    /**
     * @inheritDoc
     */
    public function showIndexes(string $tableName): Index
    {

        $index = new Index();

        $this->statements[] = $index->indexes()->from($tableName);

        return $index;

    }

    /**
     * @inheritDoc
     */
    public function showKeys(string $tableName): Index
    {

        $index = new Index();

        $this->statements[] = $index->keys()->from($tableName);

        return $index;

    }

    /**
     * @inheritDoc
     */
    public function showPrivileges(): Privileges
    {

        $privileges = new Privileges();

        $this->statements[] = $privileges->privileges();

        return $privileges;

    }

    /**
     * @inheritDoc
     */
    public function showTables(): Tables
    {

        $tables = new Tables();

        $this->statements[] = $tables->tables();

        return $tables;

    }

    /**
     * @inheritDoc
     */
    public function showTriggers(string $dbname): Triggers
    {

        $triggers = new Triggers();

        $this->statements[] = $triggers->triggers()->from($dbname);

        return $triggers;

    }

    /**
     * @inheritDoc
     */
    public function showVariables(): Variables
    {

        $variables = new Variables();

        $this->statements[] = $variables->variables();

        return $variables;

    }

    /**
     * @inheritDoc
     */
    public function createTable(string $tableName, callable $callback): CreateTable
    {

        $createTable = new CreateTable();
        $column = new Column();
        $reference = new Reference();

        call_user_func($callback, $column, $reference);

        $createTable->table($tableName)->columns($column, [] === $reference->getReferences() ? null : $reference);

        $this->statements[] = $createTable;

        return $createTable;

    }

    /**
     * @inheritDoc
     */
    public function createDatabase(string $dbname): CreateDatabase
    {

        $createDatabase = new CreateDatabase();

        $this->statements[] = $createDatabase->database($dbname);

        return $createDatabase;

    }

    /**
     * @inheritDoc
     */
    public function dropTable(string $tableName): DropTable
    {

        $dropTable = new DropTable();

        $this->statements[] = $dropTable->table($tableName);

        return $dropTable;

    }

    /**
     * @inheritDoc
     */
    public function dropDatabase(string $dbname): DropDatabase
    {

        $dropDatabase = new DropDatabase();

        $this->statements[] = $dropDatabase->database($dbname);

        return $dropDatabase;

    }

    /**
     * @inheritDoc
     */
    public function addColumn(string $tableName, callable $callback): Schema
    {

        $column = new Column();
        $addToTable = new AddToTable();

        call_user_func($callback, $column);

        $this->statements[] = $addToTable->table($tableName)->addColumn($column);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function renameColumn(string $tableName, string $oldColumnName, string $newColumnName): Schema
    {

        $rename = new Rename();

        $this->statements[] = $rename->table($tableName)->renameColumn($oldColumnName, $newColumnName);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function renameTable(string $tableName, string $newTableName): Schema
    {

        $rename = new Rename();

        $this->statements[] = $rename->table($tableName)->renameTable($newTableName);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function addStatement(StatementInterface $statement): Schema
    {

        $this->statements[] = $statement;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function addSQL(string $sql): Schema
    {

        $this->queries[] = $sql;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQueries(): array
    {

        foreach ($this->statements as $statement) {
            $this->queries[] = $statement->getQuery();
        }

        return $this->queries;

    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {

        return implode(';', $this->getQueries());

    }

}