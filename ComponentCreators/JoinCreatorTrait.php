<?php

namespace Codememory\Components\Database\Schema\ComponentCreators;

use Codememory\Components\Database\Schema\Collectors\JoinCollector;
use Codememory\Components\Database\Schema\StatementComponents\Join;

/**
 * Trait JoinCreatorTrait
 *
 * @package Codememory\Components\Database\Schema\ComponentCreators
 *
 * @author  Codememory
 */
trait JoinCreatorTrait
{

    /**
     * @param Join $join
     *
     * @return static
     */
    public function join(Join $join): static
    {

        $this->commands[] = (string) new JoinCollector($join);

        return $this;

    }

}