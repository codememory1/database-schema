<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\ComponentCreators\JoinCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\OrderCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\WhereCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;
use Codememory\Components\Database\Schema\Interfaces\UpdateInterface;
use Codememory\Support\Arr;

/**
 * Class Update
 *
 * @package Codememory\Components\Database\Schema\ManipulationStatements
 *
 * @author  Codememory
 */
class Update implements StatementInterface, UpdateInterface
{

    use ValueWrapperTrait;
    use WhereCreatorTrait;
    use OrderCreatorTrait;
    use LimitCreatorTrait;
    use JoinCreatorTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function update(): UpdateInterface
    {

        $this->commands[] = 'UPDATE';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function tables(array $tables): UpdateInterface
    {

        $collectedNameTables = [];

        foreach ($tables as $alias => $name) {
            if (is_string($alias)) {
                $collectedNameTables[] = sprintf('%s AS %s', $this->autoWrapAsReserved($name), $alias);
            } else {
                $collectedNameTables[] = $this->autoWrapAsReserved($name);
            }
        }

        $this->commands[] = implode(',', $collectedNameTables);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function setData(array $columns, array $values): UpdateInterface
    {

        $columns = Arr::wholeKeys($columns);
        $values = Arr::wholeKeys($values);
        $columnsWithValues = [];

        foreach ($columns as $index => $column) {
            $value = $values[$index];

            $columnsWithValues[] = sprintf('%s = %s', $this->autoWrapAsReserved($column), $this->autoWrapAsValue($value));
        }

        $this->commands[] = sprintf('SET %s', implode(',', $columnsWithValues));

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return implode(' ', $this->commands);

    }

}