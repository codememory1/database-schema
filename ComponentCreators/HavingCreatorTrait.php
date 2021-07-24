<?php

namespace Codememory\Components\Database\Schema\ComponentCreators;

use Codememory\Components\Database\Schema\Collectors\ExpressionCollector;
use Codememory\Components\Database\Schema\StatementComponents\Expression;

/**
 * Trait HavingCreatorTrait
 *
 * @package Codememory\Components\Database\Schema\ComponentCreators
 *
 * @author  Codememory
 */
trait HavingCreatorTrait
{

    /**
     * @param Expression $expression
     *
     * @return static
     */
    public function having(Expression $expression): static
    {

        $this->commands[] = sprintf('HAVING %s', new ExpressionCollector($expression));

        return $this;

    }

}