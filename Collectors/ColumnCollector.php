<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\StatementComponents\Column;

/**
 * Class ColumnCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class ColumnCollector implements CollectorInterface
{

    use ValueWrapperTrait;

    /**
     * @var Column
     */
    private Column $column;

    /**
     * ColumnCollector constructor.
     *
     * @param Column $column
     */
    public function __construct(Column $column)
    {

        $this->column = $column;

    }

    /**
     * @return array
     */
    public function getCollectedResult(): array
    {

        $columns = [];

        foreach ($this->column->getColumns() as $column) {
            $columnToString = sprintf('%s %s', $this->asReserved($column['columnName']), $column['type']);

            if (!empty($column['parameters'])) {
                $columnToString .= sprintf('(%s)', $column['parameters']);
            }

            $definitionCommands = [];
            foreach ($column['definition']->getCommands() as $definitionCommand) {
                $definitionCommands[] = implode(' ', $definitionCommand);
            }

            if ([] !== $definitionCommands) {
                $columnToString .= sprintf(' %s', implode(' ', $definitionCommands));
            }

            $columns[] = $columnToString;
        }

        return $columns;

    }

    /**
     * @return string
     */
    public function __toString(): string
    {

        return implode(',', $this->getCollectedResult());

    }

}