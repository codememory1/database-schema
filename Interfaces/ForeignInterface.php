<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ForeignInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ForeignInterface
{

    /**
     * @param string $name
     *
     * @return ForeignInterface
     */
    public function setConstraint(string $name): ForeignInterface;

    /**
     * @param string $name
     *
     * @return ForeignInterface
     */
    public function foreignTable(string $name): ForeignInterface;

    /**
     * @param string $name
     *
     * @return ForeignInterface
     */
    public function localColumn(string $name): ForeignInterface;

    /**
     * @param string $name
     *
     * @return ForeignInterface
     */
    public function foreignColumn(string $name): ForeignInterface;

    /**
     * @param string $action
     *
     * @return ForeignInterface
     */
    public function onDelete(string $action): ForeignInterface;

    /**
     * @param string $action
     *
     * @return ForeignInterface
     */
    public function onUpdate(string $action): ForeignInterface;

}