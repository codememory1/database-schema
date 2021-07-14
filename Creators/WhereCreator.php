<?php

namespace Codememory\Components\Database\Schema\Creators;

use Codememory\Components\Database\Schema\Collectors\WhereCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Support\Str;
use JetBrains\PhpStorm\Pure;

/**
 * Class WhereCreator
 *
 * @package Codememory\Components\Database\Schema\Creators
 *
 * @author  Codememory
 */
final class WhereCreator implements CreatorInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param string ...$expression
     *
     * @return WhereCreator
     */
    public function whereAnd(string ...$expression): WhereCreator
    {

        return $this->addCommand('and', $expression);

    }

    /**
     * @param string ...$expression
     *
     * @return WhereCreator
     */
    public function whereOr(string ...$expression): WhereCreator
    {

        return $this->addCommand('or', $expression);

    }

    /**
     * @param string ...$expression
     *
     * @return WhereCreator
     */
    public function whereXor(string ...$expression): WhereCreator
    {

        return $this->addCommand('xor', $expression);

    }

    /**
     * @param string $column
     * @param string $operator
     * @param mixed  $value
     *
     * @return string
     */
    public function expression(string $column, string $operator, mixed $value): string
    {

        return sprintf(
            '%s %s %s',
            $this->autoWrapInQuotes($column),
            $operator,
            $this->autoWrapInQuotes($value, '\'')
        );

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getCollector(): CollectorInterface
    {

        return new WhereCollector($this);

    }

    /**
     * @return array
     */
    public function getCommands(): array
    {

        return $this->commands;

    }

    /**
     * @param string $logicOperator
     * @param array  $expressions
     *
     * @return WhereCreator
     */
    private function addCommand(string $logicOperator, array $expressions): WhereCreator
    {

        $commands = [];
        $logicOperator = Str::toUppercase($logicOperator);

        $commands[] = $logicOperator;

        foreach ($expressions as $expression) {
            $commands[] = $expression;
            $commands[] = $logicOperator;
        }

        $this->commands[] = $commands;

        return $this;

    }

}