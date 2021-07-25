<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface InsertInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface InsertInterface
{

    /**
     * @return InsertInterface
     */
    public function insert(): InsertInterface;

    /**
     * @return InsertInterface
     */
    public function lowPriority(): InsertInterface;

    /**
     * @return InsertInterface
     */
    public function highPriority(): InsertInterface;

    /**
     * @return InsertInterface
     */
    public function ignore(): InsertInterface;

    /**
     * @param string $tableName
     *
     * @return InsertInterface
     */
    public function table(string $tableName): InsertInterface;

    /**
     * @param string ...$columns
     *
     * @return InsertInterface
     */
    public function columns(string ...$columns): InsertInterface;

    /**
     * @param mixed ...$records
     *
     * @return InsertInterface
     */
    public function records(array ...$records): InsertInterface;

    /**
     * @param mixed ...$records
     *
     * @return InsertInterface
     */
    public function rowRecords(array ...$records): InsertInterface;

}