<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface ReferenceDefinitionInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ReferenceDefinitionInterface
{

    /**
     * @param string $name
     *
     * @return ReferenceDefinitionInterface
     */
    public function constraint(string $name): ReferenceDefinitionInterface;

    /**
     * @param string ...$keys
     *
     * @return ReferenceDefinitionInterface
     */
    public function foreignKeys(string ...$keys): ReferenceDefinitionInterface;

    /**
     * @param string $table
     *
     * @return ReferenceDefinitionInterface
     */
    public function table(string $table): ReferenceDefinitionInterface;

    /**
     * @param string ...$keys
     *
     * @return ReferenceDefinitionInterface
     */
    public function internalKeys(string ...$keys): ReferenceDefinitionInterface;

    /**
     * @param string $option
     *
     * @return ReferenceDefinitionInterface
     */
    public function onUpdate(string $option): ReferenceDefinitionInterface;

    /**
     * @param string $option
     *
     * @return ReferenceDefinitionInterface
     */
    public function onDelete(string $option): ReferenceDefinitionInterface;

}