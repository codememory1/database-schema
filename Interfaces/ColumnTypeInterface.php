<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ColumnTypeInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ColumnTypeInterface
{

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function char(?int $length = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function varchar(?int $length = null): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function tinytext(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function text(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function blob(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function mediumtext(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function longtext(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function longblob(): ColumnDefinitionInterface;

    /**
     * @param string ...$values
     *
     * @return ColumnDefinitionInterface
     */
    public function enum(string ...$values): ColumnDefinitionInterface;

    /**
     * @param string ...$values
     *
     * @return ColumnDefinitionInterface
     */
    public function set(string ...$values): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function tinyint(?int $length = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function smallint(?int $length = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function mediumint(?int $length = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function int(?int $length = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnDefinitionInterface
     */
    public function bigint(?int $length = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     * @param int|null $afterSeparator
     *
     * @return ColumnDefinitionInterface
     */
    public function float(?int $length = null, ?int $afterSeparator = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     * @param int|null $afterSeparator
     *
     * @return ColumnDefinitionInterface
     */
    public function double(?int $length = null, ?int $afterSeparator = null): ColumnDefinitionInterface;

    /**
     * @param int|null $length
     * @param int|null $afterSeparator
     *
     * @return ColumnDefinitionInterface
     */
    public function decimal(?int $length = null, ?int $afterSeparator = null): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function date(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function datetime(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function timestamp(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function time(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function year(): ColumnDefinitionInterface;

}