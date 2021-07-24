<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\StatementComponents\Group;
use JetBrains\PhpStorm\Pure;

/**
 * Class GroupCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class GroupCollector implements CollectorInterface
{

    /**
     * @var Group
     */
    private Group $group;

    /**
     * GroupCollector constructor.
     *
     * @param Group $group
     */
    public function __construct(Group $group)
    {

        $this->group = $group;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getCollectedResult(): array
    {

        return [implode(' ', $this->group->getCommand())];

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function __toString(): string
    {

        return implode(' ', $this->group->getCommand());

    }

}