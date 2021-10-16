<?php

ini_set('display_errors', 1);

use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Components\Database\Schema\Interfaces\ColumnTypeInterface;
use Codememory\Components\Database\Schema\Interfaces\CreateTableInterface;
use Codememory\Components\Database\Schema\Interfaces\ForeignInterface;
use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Codememory\Components\Database\Schema\Definitions\Column;
use Codememory\Components\Database\Schema\Schema as CDMSchema;
use Doctrine\DBAL\DriverManager;

require 'vendor/autoload.php';

dd(DriverManager::getConnection([])->createQueryBuilder()->select());

//$cdmSchema = new CDMSchema();
//
//$cdmSchema->createTable('users', function (CreateTableInterface $table) {
//    $table->addColumns(function (ColumnInterface $column) {
//        $column->kit()->id();
//        $column->kit()->timestamps();
//    });
//})->setCharsetByCollate('utf18_general_ci');
//$cdmSchema->dropTable('users');
//dd($cdmSchema->getDoctrineSchema()->toSql(new MySQL80Platform()));
//dd($cdmSchema->getDoctrineSchema()->toSql(new MySQL80Platform()));
//
//die;

$schema = new Schema();
$table = $schema->createTable('red');
$table->addColumn('desc', 'integer')->setComment('Возвраст')->setCustomSchemaOption('primary key', 'red');

$table->addForeignKeyConstraint($table, ['desc'], ['desc'], ['onUpdate' => 'CASCADE']);
$schema->dropTable('red');

dd($schema->toSql(new MySQL80Platform()));
dd($schema->toSql(new MySQL80Platform()));