<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Union
 *
 * @package Codememory\Components\Database\Schema\ManipulationStatements
 *
 * @author  Codememory
 */
class Union implements StatementInterface
{

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param Select ...$select
     *
     * @return Union
     */
    public function union(Select ...$select): Union
    {

        $query = array_map(function (Select $select) {
            return $select->getQuery();
        }, $select);

        $this->commands = $query;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return implode(' UNION ', $this->commands);

    }

}