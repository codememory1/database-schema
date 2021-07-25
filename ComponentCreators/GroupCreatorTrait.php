<?php

namespace Codememory\Components\Database\Schema\ComponentCreators;

use Codememory\Components\Database\Schema\Collectors\GroupCollector;
use Codememory\Components\Database\Schema\StatementComponents\Group;

/**
 * Trait GroupCreatorTrait
 *
 * @package Codememory\Components\Database\Schema\ComponentCreators
 *
 * @author  Codememory
 */
trait GroupCreatorTrait
{

    /**
     * @inheritDoc
     */
    public function groupBy(Group $group): static
    {

        $this->commands[] = sprintf('GROUP BY %s', new GroupCollector($group));

        return $this;

    }

}