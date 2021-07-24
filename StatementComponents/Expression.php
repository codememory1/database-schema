<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\ExpressionInterface;
use Codememory\Support\Str;

/**
 * Class Expression
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
class Expression implements ExpressionInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function exprAnd(string ...$conditions): ExpressionInterface
    {

        $this->addCommand('and', $conditions);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function exprOr(string ...$conditions): ExpressionInterface
    {

        $this->addCommand('or', $conditions);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function exprXor(string ...$conditions): ExpressionInterface
    {

        $this->addCommand('xor', $conditions);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function condition(string $columnName, string $operator, float|int|string $value): string
    {

        return sprintf('%s %s %s', $this->autoWrapAsReserved($columnName), $operator, $this->autoWrapAsValue($value));

    }

    /**
     * @inheritDoc
     */
    public function range(string $columnName, int $min, int $max): string
    {

        return sprintf('(%s BETWEEN %s AND %s)', $this->autoWrapAsReserved($columnName), $min, $max);

    }

    /**
     * @inheritDoc
     */
    public function notRange(string $columnName, int $min, int $max): string
    {

        return sprintf('(%s NOT BETWEEN %s AND %s)', $this->autoWrapAsReserved($columnName), $min, $max);

    }

    /**
     * @inheritDoc
     */
    public function in(string $columnName, string ...$values): string
    {

        $values = array_map(function (string $value) {
            return $this->wrap($value, '\'');
        }, $values);

        return sprintf('%s IN(%s)', $this->autoWrapAsReserved($columnName), implode(',', $values));

    }

    /**
     * @inheritDoc
     */
    public function notIn(string $columnName, string ...$values): string
    {

        $values = array_map(function (string $value) {
            return $this->wrap($value, '\'');
        }, $values);

        return sprintf('%s NOT IN(%s)', $this->autoWrapAsReserved($columnName), implode(',', $values));

    }

    /**
     * @inheritDoc
     */
    public function isNull(string $columnName): string
    {

        return sprintf('%s IS NULL', $this->autoWrapAsReserved($columnName));

    }

    /**
     * @inheritDoc
     */
    public function isNotNull(string $columnName): string
    {

        return sprintf('%s IS NOT NULL', $this->autoWrapAsReserved($columnName));

    }

    /**
     * @inheritDoc
     */
    public function regexp(string $columnName, string $pattern): string
    {

        return sprintf('%s REGEXP %s', $this->autoWrapAsReserved($columnName), $this->wrap($pattern, '\''));

    }

    /**
     * @inheritDoc
     */
    public function notRegexp(string $columnName, string $pattern): string
    {

        return sprintf('%s NOT REGEXP %s', $this->autoWrapAsReserved($columnName), $this->wrap($pattern, '\''));

    }

    /**
     * @inheritDoc
     */
    public function like(string $columnName, string $pattern): string
    {

        return sprintf('%s LIKE %s', $this->autoWrapAsReserved($columnName), $this->wrap($pattern, '\''));

    }

    /**
     * @inheritDoc
     */
    public function notLike(string $columnName, string $pattern): string
    {

        return sprintf('%s NOT LIKE %s', $this->autoWrapAsReserved($columnName), $this->wrap($pattern, '\''));

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
     * @return void
     */
    private function addCommand(string $logicOperator, array $expressions): void
    {

        $commands = [];
        $logicOperator = Str::toUppercase($logicOperator);

        $commands[] = $logicOperator;

        foreach ($expressions as $expression) {
            $commands[] = $expression;
            $commands[] = $logicOperator;
        }

        $this->commands[] = $commands;

    }

}