<?php

namespace Codememory\Components\Database\Schema\Interfaces;

use Codememory\Components\Database\Schema\Schema;
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
use Codememory\Components\Database\Schema\Statements\Definition\CreateDatabase;
use Codememory\Components\Database\Schema\Statements\Definition\CreateTable;
use Codememory\Components\Database\Schema\Statements\Definition\DropDatabase;
use Codememory\Components\Database\Schema\Statements\Definition\DropTable;
use Codememory\Components\Database\Schema\Statements\Manipulation\Delete;
use Codememory\Components\Database\Schema\Statements\Manipulation\Insert;
use Codememory\Components\Database\Schema\Statements\Manipulation\Select;
use Codememory\Components\Database\Schema\Statements\Manipulation\Update;

/**
 * Interface SchemaInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface SchemaInterface
{

    /**
     * @return Select
     */
    public function select(): Select;

    /**
     * @return Insert
     */
    public function insert(): Insert;

    /**
     * @return Update
     */
    public function update(): Update;

    /**
     * @return Delete
     */
    public function delete(): Delete;

    /**
     * @return Collation
     */
    public function showCollations(): Collation;

    /**
     * @param string $tableName
     *
     * @return Columns
     */
    public function showColumns(string $tableName): Columns;

    /**
     * @param string $tableName
     *
     * @return Columns
     */
    public function showFields(string $tableName): Columns;

    /**
     * @return Databases
     */
    public function showDatabases(): Databases;

    /**
     * @return Databases
     */
    public function showSchema(): Databases;

    /**
     * @return Engines
     */
    public function showEngines(): Engines;

    /**
     * @param string $schemaName
     *
     * @return Events
     */
    public function showEvents(string $schemaName): Events;

    /**
     * @param string $tableName
     *
     * @return Index
     */
    public function showIndex(string $tableName): Index;

    /**
     * @param string $tableName
     *
     * @return Index
     */
    public function showIndexes(string $tableName): Index;

    /**
     * @param string $tableName
     *
     * @return Index
     */
    public function showKeys(string $tableName): Index;

    /**
     * @return Privileges
     */
    public function showPrivileges(): Privileges;

    /**
     * @return Tables
     */
    public function showTables(): Tables;

    /**
     * @param string $dbname
     *
     * @return Triggers
     */
    public function showTriggers(string $dbname): Triggers;

    /**
     * @return Variables
     */
    public function showVariables(): Variables;

    /**
     * @param string   $tableName
     * @param callable $callback
     *
     * @return CreateTable
     */
    public function createTable(string $tableName, callable $callback): CreateTable;

    /**
     * @param string $dbname
     *
     * @return CreateDatabase
     */
    public function createDatabase(string $dbname): CreateDatabase;

    /**
     * @param string $tableName
     *
     * @return DropTable
     */
    public function dropTable(string $tableName): DropTable;

    /**
     * @param string $dbname
     *
     * @return DropDatabase
     */
    public function dropDatabase(string $dbname): DropDatabase;

    /**
     * @param string   $tableName
     * @param callable $callback
     *
     * @return Schema
     */
    public function addColumn(string $tableName, callable $callback): Schema;

    /**
     * @param string $tableName
     * @param string $oldColumnName
     * @param string $newColumnName
     *
     * @return Schema
     */
    public function renameColumn(string $tableName, string $oldColumnName, string $newColumnName): Schema;

    /**
     * @param string $tableName
     * @param string $newTableName
     *
     * @return Schema
     */
    public function renameTable(string $tableName, string $newTableName): Schema;

    /**
     * @param StatementInterface $statement
     *
     * @return Schema
     */
    public function addStatement(StatementInterface $statement): Schema;

    /**
     * @param string $sql
     *
     * @return Schema
     */
    public function addSQL(string $sql): Schema;

    /**
     * @return array
     */
    public function getQueries(): array;

    /**
     * @return string
     */
    public function __toString(): string;

}