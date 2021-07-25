<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface JoinInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface JoinInterface extends JoinSpecificationInterface
{

    /**
     * @param array  $tables
     * @param string $specification
     *
     * @return JoinInterface
     */
    public function innerJoin(array $tables, string $specification): JoinInterface;

    /**
     * @param array  $tables
     * @param string $specification
     *
     * @return JoinInterface
     */
    public function leftJoin(array $tables, string $specification): JoinInterface;

    /**
     * @param array  $tables
     * @param string $specification
     *
     * @return JoinInterface
     */
    public function rightJoin(array $tables, string $specification): JoinInterface;

}