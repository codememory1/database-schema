<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface TransactionInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface TransactionInterface
{

    /**
     * @return TransactionInterface
     */
    public function start(): TransactionInterface;

    /**
     * @param StatementInterface ...$statements
     *
     * @return mixed
     */
    public function addStatements(StatementInterface ...$statements): TransactionInterface;

    /**
     * @return TransactionInterface
     */
    public function commit(): TransactionInterface;

    /**
     * @return TransactionInterface
     */
    public function rollback(): TransactionInterface;

    /**
     * @param bool $auto
     *
     * @return TransactionInterface
     */
    public function autoCommit(bool $auto): TransactionInterface;

    /**
     * @param string $id
     *
     * @return TransactionInterface
     */
    public function savepoint(string $id): TransactionInterface;

    /**
     * @param string $id
     *
     * @return TransactionInterface
     */
    public function rollbackTo(string $id): TransactionInterface;

    /**
     * @param string $id
     *
     * @return TransactionInterface
     */
    public function rollbackToSavepoint(string $id): TransactionInterface;

    /**
     * @param string $id
     *
     * @return TransactionInterface
     */
    public function releaseSavepoint(string $id): TransactionInterface;

}