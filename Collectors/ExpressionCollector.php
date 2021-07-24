<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\StatementComponents\Expression;

/**
 * Class ExpressionCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class ExpressionCollector implements CollectorInterface
{

    /**
     * @var Expression
     */
    private Expression $expression;

    /**
     * ExpressionCollector constructor.
     *
     * @param Expression $expression
     */
    public function __construct(Expression $expression)
    {

        $this->expression = $expression;

    }

    /**
     * @inheritDoc
     */
    public function getCollectedResult(): array
    {

        $collectorExpressions = [];

        foreach ($this->expression->getCommands() as $commands) {
            unset($commands[array_key_last($commands)]);

            foreach ($commands as $command) {
                $collectorExpressions[] = $command;
            }
        }

        if ([] !== $collectorExpressions) {
            unset($collectorExpressions[array_key_first($collectorExpressions)]);
        }

        return $collectorExpressions;

    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {

        return implode(' ', $this->getCollectedResult());

    }

}