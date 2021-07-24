<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Subquery
 *
 * @package Codememory\Components\Database\Schema\StatementComponents
 *
 * @author  Codememory
 */
class Subquery
{

    /**
     * @param StatementInterface $statement
     *
     * @return string|null
     */
    public function create(StatementInterface $statement): ?string
    {

        return sprintf('(%s)', $statement->getQuery());

    }

}