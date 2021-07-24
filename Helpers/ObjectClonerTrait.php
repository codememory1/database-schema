<?php

namespace Codememory\Components\Database\Schema\Helpers;

use JetBrains\PhpStorm\Pure;

/**
 * Trait ObjectClonerTrait
 *
 * @package Codememory\Components\Database\Schema\Helpers
 *
 * @author  Codememory
 */
trait ObjectClonerTrait
{

    /**
     * @return $this
     */
    #[Pure]
    public function createObject(): static
    {

        return clone new static();

    }

}