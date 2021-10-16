<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ColumnOptionsInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ColumnOptionsInterface
{

    /**
     * @param int $value
     *
     * @return ColumnOptionsInterface
     */
    public function precision(int $value): ColumnOptionsInterface;

    /**
     * @param int $value
     *
     * @return ColumnOptionsInterface
     */
    public function scale(int $value): ColumnOptionsInterface;

    /**
     * @param bool $unsigned
     *
     * @return ColumnOptionsInterface
     */
    public function unsigned(bool $unsigned = true): ColumnOptionsInterface;

    /**
     * @param bool $fixed
     *
     * @return ColumnOptionsInterface
     */
    public function fixed(bool $fixed = true): ColumnOptionsInterface;

    /**
     * @param bool $nullable
     *
     * @return ColumnOptionsInterface
     */
    public function nullable(bool $nullable = true): ColumnOptionsInterface;

    /**
     * @param mixed $value
     *
     * @return ColumnOptionsInterface
     */
    public function default(mixed $value): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function autoincrement(): ColumnOptionsInterface;

    /**
     * @param string $indexName
     *
     * @return ColumnOptionsInterface
     */
    public function primary(string $indexName = 'primary'): ColumnOptionsInterface;

    /**
     * @param string $value
     *
     * @return ColumnOptionsInterface
     */
    public function comment(string $value): ColumnOptionsInterface;

    /**
     * @param callable $callback
     *
     * @return ColumnOptionsInterface
     */
    public function foreign(callable $callback): ColumnOptionsInterface;

}