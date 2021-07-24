<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Collectors\ExpressionCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\ExpressionInterface;
use Codememory\Components\Database\Schema\Interfaces\JoinInterface;
use Codememory\Support\Str;
use JetBrains\PhpStorm\Pure;

/**
 * Class Join
 *
 * @package Codememory\Components\Database\Schema\StatementComponents
 *
 * @author  Codememory
 */
class Join implements JoinInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function innerJoin(array $tables, string $specification): JoinInterface
    {

        $this->createJoin('inner', $tables, $specification);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function leftJoin(array $tables, string $specification): JoinInterface
    {

        $this->createJoin('left', $tables, $specification);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function rightJoin(array $tables, string $specification): JoinInterface
    {

        $this->createJoin('right', $tables, $specification);

        return $this;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function on(ExpressionInterface $expression): string
    {

        return sprintf('ON (%s)', new ExpressionCollector($expression));

    }

    /**
     * @inheritDoc
     */
    public function using(array $columns): string
    {

        $columns = array_map(function (mixed $column) {
            return $this->autoWrapAsReserved($column);
        }, $columns);

        return sprintf('USING (%s)', implode(',', $columns));

    }

    /**
     * @return array
     */
    public function getCommands(): array
    {

        return $this->commands;

    }

    /**
     * @param string $type
     * @param array  $tables
     * @param string $specification
     *
     * @return void
     */
    private function createJoin(string $type, array $tables, string $specification): void
    {

        $collectedNameTables = [];

        foreach ($tables as $alias => $table) {
            if (is_string($alias)) {
                $collectedNameTables[] = sprintf('%s AS %s', $this->autoWrapAsReserved($table), $alias);
            } else {
                $collectedNameTables[] = $this->autoWrapAsReserved($table);
            }
        }

        $this->commands[] = sprintf(
            '%s JOIN (%s) %s',
            Str::toUppercase($type),
            implode(',', $collectedNameTables),
            $specification
        );

    }

}