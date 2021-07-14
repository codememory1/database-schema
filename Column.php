<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\Exceptions\NotInitColumnException;
use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Components\Database\Schema\Interfaces\ColumnTypeInterface;

/**
 * Class Column
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
final class Column implements ColumnInterface, ColumnTypeInterface
{

    /**
     * @var string|null
     */
    private ?string $columnName = null;

    /**
     * @var array
     */
    private array $columns = [];

    /**
     * @inheritDoc
     */
    public function initColumn(string $columnName): ColumnTypeInterface
    {

        $this->columnName = $columnName;

        return $this;

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function char(int $length): ColumnParameters
    {

        return $this->addColumn('char', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function varchar(int $length): ColumnParameters
    {

        return $this->addColumn('varchar', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function json(): ColumnParameters
    {

        return $this->addColumn('json');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function binary(int $length): ColumnParameters
    {

        return $this->addColumn('binary', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function varbinary(int $length): ColumnParameters
    {

        return $this->addColumn('varbinary', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function tinyblob(): ColumnParameters
    {

        return $this->addColumn('tinyblob');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function tinytext(): ColumnParameters
    {

        return $this->addColumn('tinytext');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function text(int $length): ColumnParameters
    {

        return $this->addColumn('text', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function blob(int $length): ColumnParameters
    {

        return $this->addColumn('blob', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function mediumtext(): ColumnParameters
    {

        return $this->addColumn('mediumtext');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function mediumblob(): ColumnParameters
    {

        return $this->addColumn('mediumblob');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function longtext(): ColumnParameters
    {

        return $this->addColumn('longtext');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function longblob(): ColumnParameters
    {

        return $this->addColumn('longblob');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function enum(string|int|float ...$values): ColumnParameters
    {

        return $this->addColumn('enum', [], $values);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function set(string|int|float ...$values): ColumnParameters
    {

        return $this->addColumn('set', [], $values);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function bit(int $length): ColumnParameters
    {

        return $this->addColumn('bit', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function tinyint(int $length): ColumnParameters
    {

        return $this->addColumn('tinyint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function bool(): ColumnParameters
    {

        return $this->addColumn('bool');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function boolean(): ColumnParameters
    {

        return $this->addColumn('boolean');

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function smallint(int $length): ColumnParameters
    {

        return $this->addColumn('smallint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function mediumint(int $length): ColumnParameters
    {

        return $this->addColumn('mediumint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function int(int $length): ColumnParameters
    {

        return $this->addColumn('int', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function integer(int $length): ColumnParameters
    {

        return $this->addColumn('integer', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function bigint(int $length): ColumnParameters
    {

        return $this->addColumn('bigint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function float(int $length): ColumnParameters
    {

        return $this->addColumn('float', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function double(int $length): ColumnParameters
    {

        return $this->addColumn('double', [$length]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function decimal(int $length, int $afterPoint = 3): ColumnParameters
    {

        return $this->addColumn('decimal', [$length, $afterPoint]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function desc(int $length, int $afterPoint = 3): ColumnParameters
    {

        return $this->addColumn('desc', [$length, $afterPoint]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function datetime(string $format = 'YYYY-MM-DD hh:mm:ss'): ColumnParameters
    {

        return $this->addColumn('datetime', [$format]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function timestamp(string $format = 'YYYY-MM-DD hh:mm:ss'): ColumnParameters
    {

        return $this->addColumn('timestamp', [$format]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function time(string $format = 'hh:mm:ss'): ColumnParameters
    {

        return $this->addColumn('time', [$format]);

    }

    /**
     * @inheritDoc
     * @throws NotInitColumnException
     */
    public function year(): ColumnParameters
    {

        return $this->addColumn('year');

    }

    /**
     * @return array
     */
    public function getColumns(): array
    {

        return $this->columns;

    }

    /**
     * @param string $type
     * @param array  $parameters
     * @param array  $values
     *
     * @return ColumnParameters
     * @throws NotInitColumnException
     */
    private function addColumn(string $type, array $parameters = [], array $values = []): ColumnParameters
    {

        if(null === $this->columnName) {
            throw new NotInitColumnException();
        }

        $this->columns[] = [
            'definition' => new ColumnDefinition($type, $this->columnName, $parameters, $values),
            'parameters' => $columnParameters = new ColumnParameters($this->columnName)
        ];

        return $columnParameters;

    }

}