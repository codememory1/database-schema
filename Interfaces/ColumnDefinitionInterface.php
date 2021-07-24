<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ColumnDefinitionInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ColumnDefinitionInterface
{

    /**
     * @param string $name
     *
     * @return ColumnDefinitionInterface
     */
    public function constraint(string $name): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function notNull(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function null(): ColumnDefinitionInterface;

    /**
     * @param string $value
     *
     * @return ColumnDefinitionInterface
     */
    public function default(string $value): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function visible(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function invisible(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function increment(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function primary(): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function unique(): ColumnDefinitionInterface;

    /**
     * @param string $comment
     *
     * @return ColumnDefinitionInterface
     */
    public function comment(string $comment): ColumnDefinitionInterface;

    /**
     * @param string $collate
     *
     * @return ColumnDefinitionInterface
     */
    public function collate(string $collate): ColumnDefinitionInterface;

    /**
     * @param string $format
     *
     * @return ColumnDefinitionInterface
     */
    public function format(string $format): ColumnDefinitionInterface;

    /**
     * @param string $storage
     *
     * @return ColumnDefinitionInterface
     */
    public function storage(string $storage): ColumnDefinitionInterface;

    /**
     * @return ColumnDefinitionInterface
     */
    public function first(): ColumnDefinitionInterface;

    /**
     * @param string $columnName
     *
     * @return ColumnDefinitionInterface
     */
    public function after(string $columnName): ColumnDefinitionInterface;

}