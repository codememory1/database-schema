<?php

namespace Codememory\Components\Database\Schema\ComponentCreators;

use Codememory\Components\Database\Schema\Collectors\OrderCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\StatementComponents\Order;

/**
 * Trait OrderCreatorTrait
 *
 * @package Codememory\Components\Database\Schema\ComponentCreators
 *
 * @author  Codememory
 */
trait OrderCreatorTrait
{

    use ValueWrapperTrait;

    /**
     * @param Order $order
     *
     * @return static
     */
    public function orderBy(Order $order): static
    {

        $this->commands[] = sprintf('ORDER BY %s', new OrderCollector($order));

        return $this;

    }

}