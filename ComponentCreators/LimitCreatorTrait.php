<?php

namespace Codememory\Components\Database\Schema\ComponentCreators;

/**
 * Trait LimitCreatorTrait
 *
 * @package Codememory\Components\Database\Schema\ComponentCreators
 *
 * @author  Codememory
 */
trait LimitCreatorTrait
{

    /**
     * @param int      $from
     * @param int|null $before
     *
     * @return static
     */
    public function limit(int $from, ?int $before = null): static
    {

        $limit = sprintf('LIMIT %s', $from);

        if (null !== $before) {
            $limit .= sprintf(' OFFSET %s', $before);
        }

        $this->commands[] = $limit;

        return $this;

    }

}