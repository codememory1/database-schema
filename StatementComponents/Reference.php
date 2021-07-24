<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Interfaces\ReferenceInterface;

/**
 * Class Reference
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class Reference implements ReferenceInterface
{

    /**
     * @var array
     */
    private array $references = [];

    /**
     * @inheritDoc
     */
    public function add(callable $callback): ReferenceInterface
    {

        $definition = new ReferenceDefinition();

        call_user_func($callback, $definition);

        $this->references[] = $definition;

        return $this;

    }

    /**
     * @return array
     */
    public function getReferences(): array
    {

        return $this->references;

    }

}