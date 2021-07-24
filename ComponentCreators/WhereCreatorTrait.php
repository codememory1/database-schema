<?php

namespace Codememory\Components\Database\Schema\ComponentCreators;

use Codememory\Components\Database\Schema\Collectors\ExpressionCollector;
use Codememory\Components\Database\Schema\StatementComponents\Expression;

/**
 * Trait WhereCreatorTrait
 *
 * @package Codememory\Components\Database\Schema\ComponentCreators
 *
 * @author  Codememory
 */
trait WhereCreatorTrait
{

    /**
     * @param Expression $expression
     *
     * @return static
     */
    public function where(Expression $expression): static
    {

        $this->commands[] = sprintf('WHERE %s', new ExpressionCollector($expression));

        return $this;

    }

}