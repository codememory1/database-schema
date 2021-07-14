<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface TableCreatorInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface TableCreatorInterface
{

    /**
     * @param string $charset
     *
     * @return TableCreatorInterface
     */
    public function setCharset(string $charset): TableCreatorInterface;

    /**
     * @param string $collate
     *
     * @return TableCreatorInterface
     */
    public function setCollate(string $collate): TableCreatorInterface;

}