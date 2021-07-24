<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\StatementComponents\Join;
use JetBrains\PhpStorm\Pure;

/**
 * Class JoinCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class JoinCollector implements CollectorInterface
{

    /**
     * @var Join
     */
    private Join $join;

    /**
     * JoinCollector constructor.
     *
     * @param Join $join
     */
    public function __construct(Join $join)
    {

        $this->join = $join;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getCollectedResult(): array
    {

        return $this->join->getCommands();

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function __toString(): string
    {

        return implode(' ', $this->getCollectedResult());

    }

}