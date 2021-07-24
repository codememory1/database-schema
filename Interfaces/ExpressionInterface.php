<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ExpressionInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ExpressionInterface
{

    /**
     * @param string ...$conditions
     *
     * @return ExpressionInterface
     */
    public function exprAnd(string ...$conditions): ExpressionInterface;

    /**
     * @param string ...$conditions
     *
     * @return ExpressionInterface
     */
    public function exprOr(string ...$conditions): ExpressionInterface;

    /**
     * @param string ...$conditions
     *
     * @return ExpressionInterface
     */
    public function exprXor(string ...$conditions): ExpressionInterface;

    /**
     * @param string           $columnName
     * @param string           $operator
     * @param string|int|float $value
     *
     * @return string
     */
    public function condition(string $columnName, string $operator, string|int|float $value): string;

    /**
     * @param string $columnName
     * @param int    $min
     * @param int    $max
     *
     * @return string
     */
    public function range(string $columnName, int $min, int $max): string;

    /**
     * @param string $columnName
     * @param int    $min
     * @param int    $max
     *
     * @return string
     */
    public function notRange(string $columnName, int $min, int $max): string;

    /**
     * @param string $columnName
     * @param string ...$values
     *
     * @return string
     */
    public function in(string $columnName, string ...$values): string;

    /**
     * @param string $columnName
     * @param string ...$values
     *
     * @return string
     */
    public function notIn(string $columnName, string ...$values): string;

    /**
     * @param string $columnName
     *
     * @return string
     */
    public function isNull(string $columnName): string;

    /**
     * @param string $columnName
     *
     * @return string
     */
    public function isNotNull(string $columnName): string;

    /**
     * @param string $columnName
     * @param string $pattern
     *
     * @return string
     */
    public function regexp(string $columnName, string $pattern): string;

    /**
     * @param string $columnName
     * @param string $pattern
     *
     * @return string
     */
    public function notRegexp(string $columnName, string $pattern): string;

    /**
     * @param string $columnName
     * @param string $pattern
     *
     * @return string
     */
    public function like(string $columnName, string $pattern): string;

    /**
     * @param string $columnName
     * @param string $pattern
     *
     * @return string
     */
    public function notLike(string $columnName, string $pattern): string;

}