<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\InsertInterface;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Insert
 *
 * @package Codememory\Components\Database\Schema\ManipulationStatements
 *
 * @author  Codememory
 */
class Insert implements StatementInterface, InsertInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function insert(): InsertInterface
    {

        $this->commands[] = 'INSERT INTO';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function lowPriority(): InsertInterface
    {

        $this->commands[] = 'LOW_PRIORITY';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function highPriority(): InsertInterface
    {

        $this->commands[] = 'HIGH_PRIORITY';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function ignore(): InsertInterface
    {

        $this->commands[] = 'IGNORE';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function table(string $tableName): InsertInterface
    {

        $this->commands[] = $this->autoWrapAsReserved($tableName);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function columns(string ...$columns): InsertInterface
    {

        $columns = array_map(function (string $column) {
            return $this->autoWrapAsReserved($column);
        }, $columns);

        $this->commands[] = sprintf('(%s)', implode(',', $columns));

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function records(array ...$records): InsertInterface
    {

        $this->createRecords($records);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function rowRecords(array ...$records): InsertInterface
    {

        $this->createRecords($records, 'ROW');

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return implode(' ', $this->commands);

    }

    /**
     * @param array       $records
     * @param string|null $prefixRecord
     *
     * @return void
     */
    private function createRecords(array $records, ?string $prefixRecord = null): void
    {

        $collectedRecords = [];

        foreach ($records as $record) {
            $record = array_map(function (mixed $value) {
                return $this->autoWrapAsValue($value);
            }, $record);
            $collectedRecords[] = sprintf('%s(%s)', $prefixRecord, implode(',', $record));
        }

        $this->commands[] = sprintf('VALUES %s', implode(',', $collectedRecords));

    }

}