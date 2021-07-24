<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Exceptions\ColumnNameNotSpecifiedException;
use Codememory\Components\Database\Schema\Interfaces\ColumnDefinitionInterface;
use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Components\Database\Schema\Interfaces\ColumnTypeInterface;
use Codememory\Support\Str;

/**
 * Class Column
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class Column implements ColumnInterface, ColumnTypeInterface
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
    public function setColumnName(string $name): ColumnTypeInterface
    {

        $this->columnName = $name;

        return $this;

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function char(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('char', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function varchar(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('varchar', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function tinytext(): ColumnDefinitionInterface
    {

        return $this->addCommand('tinytext');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function text(): ColumnDefinitionInterface
    {

        return $this->addCommand('text');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function blob(): ColumnDefinitionInterface
    {

        return $this->addCommand('blob');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function mediumtext(): ColumnDefinitionInterface
    {

        return $this->addCommand('mediumtext');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function longtext(): ColumnDefinitionInterface
    {

        return $this->addCommand('longtext');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function longblob(): ColumnDefinitionInterface
    {

        return $this->addCommand('longblob');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function enum(string ...$values): ColumnDefinitionInterface
    {

        return $this->addCommand('enum', $values);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function set(string ...$values): ColumnDefinitionInterface
    {

        return $this->addCommand('set', $values);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function tinyint(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('tinyint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function smallint(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('smallint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function mediumint(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('mediumint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function int(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('int', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function bigint(?int $length = null): ColumnDefinitionInterface
    {

        return $this->addCommand('bigint', [$length]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function float(?int $length = null, ?int $afterSeparator = null): ColumnDefinitionInterface
    {

        return $this->addCommand('float', [$length, $afterSeparator]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function double(?int $length = null, ?int $afterSeparator = null): ColumnDefinitionInterface
    {

        return $this->addCommand('double', [$length, $afterSeparator]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function decimal(?int $length = null, ?int $afterSeparator = null): ColumnDefinitionInterface
    {

        return $this->addCommand('decimal', [$length, $afterSeparator]);

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function date(): ColumnDefinitionInterface
    {

        return $this->addCommand('date');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function datetime(): ColumnDefinitionInterface
    {

        return $this->addCommand('datetime');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function timestamp(): ColumnDefinitionInterface
    {

        return $this->addCommand('timestamp');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function time(): ColumnDefinitionInterface
    {

        return $this->addCommand('time');

    }

    /**
     * @inheritDoc
     * @throws ColumnNameNotSpecifiedException
     */
    public function year(): ColumnDefinitionInterface
    {

        return $this->addCommand('year');

    }

    /**
     * @return array
     */
    public function getColumns(): array
    {

        return $this->columns;

    }

    /**
     * @param string     $type
     * @param array|null $parameters
     *
     * @return ColumnDefinitionInterface
     * @throws ColumnNameNotSpecifiedException
     */
    private function addCommand(string $type, ?array $parameters = []): ColumnDefinitionInterface
    {

        if (null === $this->columnName) {
            throw new ColumnNameNotSpecifiedException();
        }

        foreach ($parameters as $index => $parameter) {
            if (null === $parameter) {
                unset($parameters[$index]);
            }
        }

        $parameters = array_map(function (mixed $value) {
            return !is_integer($value) ? sprintf('\'%s\'', $value) : $value;
        }, $parameters);
        $columnDefinition = new ColumnDefinition();

        $this->columns[] = [
            'columnName' => $this->columnName,
            'type'       => Str::toUppercase($type),
            'parameters' => implode(',', $parameters),
            'definition' => $columnDefinition
        ];

        $this->columnName = null;

        return $columnDefinition;

    }

}