<?php

namespace Codememory\Components\Database\Schema\Statements\Transaction;

use Codememory\Components\Database\Schema\Interfaces\StatementInterface;
use Codememory\Components\Database\Schema\Interfaces\TransactionInterface;

/**
 * Class StartTransaction
 *
 * @package Codememory\Components\Database\Schema\Statements\Transaction
 *
 * @author  Codememory
 */
class StartTransaction implements TransactionInterface, StatementInterface
{

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function start(): StartTransaction
    {

        $this->commands[] = 'BEGIN';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function addStatements(StatementInterface ...$statements): StartTransaction
    {

        foreach ($statements as $statement) {
            $this->commands[] = $statement->getQuery();
        }

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function commit(): StartTransaction
    {

        $this->commands[] = 'COMMIT';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function rollback(): StartTransaction
    {

        $this->commands[] = 'ROLLBACK';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function autoCommit(bool $auto): StartTransaction
    {

        $this->commands[] = sprintf('SET autocommit = %s', $auto ? 1 : 0);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function savepoint(string $id): TransactionInterface
    {

        $this->commands[] = sprintf('SAVEPOINT %s', $id);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function rollbackTo(string $id): TransactionInterface
    {

        $this->commands[] = sprintf('ROLLBACK TO %s', $id);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function rollbackToSavepoint(string $id): TransactionInterface
    {

        $this->commands[] = sprintf('ROLLBACK TO SAVEPOINT %s', $id);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function releaseSavepoint(string $id): TransactionInterface
    {

        $this->commands[] = sprintf('RELEASE SAVEPOINT %s', $id);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return implode(';', $this->commands);

    }

}