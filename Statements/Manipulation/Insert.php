<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Insert
 *
 * @package Codememory\Components\Database\Schema\ManipulationStatements
 *
 * @author  Codememory
 */
class Insert implements StatementInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @return Insert
     */
    public function insert(): Insert
    {

        $this->commands[] = 'INSERT INTO';

        return $this;

    }

    /**
     * @return Insert
     */
    public function lowPriority(): Insert
    {

        $this->commands[] = 'LOW_PRIORITY';

        return $this;

    }

    /**
     * @return Insert
     */
    public function highPriority(): Insert
    {

        $this->commands[] = 'HIGH_PRIORITY';

        return $this;

    }

    /**
     * @return Insert
     */
    public function ignore(): Insert
    {

        $this->commands[] = 'IGNORE';

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return Insert
     */
    public function table(string $tableName): Insert
    {

        $this->commands[] = $this->autoWrapAsReserved($tableName);

        return $this;

    }

    /**
     * @param string ...$columns
     *
     * @return Insert
     */
    public function columns(string ...$columns): Insert
    {

        $columns = array_map(function (string $column) {
            return $this->autoWrapAsReserved($column);
        }, $columns);

        $this->commands[] = sprintf('(%s)', implode(',', $columns));

        return $this;

    }

    /**
     * @param mixed ...$records
     *
     * @return Insert
     */
    public function records(array ...$records): Insert
    {

        $this->createRecords($records);

        return $this;

    }

    /**
     * @param mixed ...$records
     *
     * @return Insert
     */
    public function rowRecords(array ...$records): Insert
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