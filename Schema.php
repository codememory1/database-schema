<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\DefinitionStatements\CreateTable;
use Codememory\Components\Database\Schema\DefinitionStatements\DropTable;
use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema as DoctrineSchema;
use Doctrine\DBAL\Schema\SchemaException;

/**
 * Class Schema
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class Schema
{

    /**
     * @var DoctrineSchema
     */
    private DoctrineSchema $doctrineSchema;

    public function __construct()
    {

        $this->doctrineSchema = new DoctrineSchema();

    }

    /**
     * @param string   $name
     * @param callable $callback
     *
     * @return CreateTable
     * @throws SchemaException
     */
    public function createTable(string $name, callable $callback): CreateTable
    {

        $table = $this->doctrineSchema->createTable($name);
        $createTable = new CreateTable($table);

        call_user_func($callback, $createTable);

        return $createTable;

    }

    public function dropTable(string $name)
    {

        $this->doctrineSchema->getMigrateFromSql($this->doctrineSchema->dropTable($name), new MySQL80Platform());
//        dd(->toSql(new MySQL80Platform()));
//        dd($this->doctrineSchema->toDropSql(new MySQL80Platform()));
//        $dropTable = new DropTable();

//        return $dropTable;

    }

    /**
     * @return DoctrineSchema
     */
    public function getDoctrineSchema(): DoctrineSchema
    {

        return $this->doctrineSchema;

    }

}