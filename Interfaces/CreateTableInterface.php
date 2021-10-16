<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface CreateTableInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface CreateTableInterface
{

    /**
     * @return string
     */
    public function getTableName(): string;

    /**
     * @return CreateTableInterface
     */
    public function isTemp(): CreateTableInterface;

    /**
     * @param callable $callback
     *
     * @return CreateTableInterface
     */
    public function addColumns(callable $callback): CreateTableInterface;

    /**
     * @param string $engine
     *
     * @return CreateTableInterface
     */
    public function setEngine(string $engine): CreateTableInterface;

    /**
     * @param string $comment
     *
     * @return CreateTableInterface
     */
    public function setComment(string $comment): CreateTableInterface;

    /**
     * @param string $charset
     *
     * @return CreateTableInterface
     */
    public function setCharset(string $charset): CreateTableInterface;

    /**
     * @param string $collate
     *
     * @return CreateTableInterface
     */
    public function setCollate(string $collate): CreateTableInterface;

    /**
     * @param string $collate
     *
     * @return CreateTableInterface
     */
    public function setCharsetByCollate(string $collate): CreateTableInterface;

}