<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\StatementComponents\Order;
use JetBrains\PhpStorm\Pure;

/**
 * Class OrderCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class OrderCollector implements CollectorInterface
{

    /**
     * @var Order
     */
    private Order $order;

    /**
     * OrderCollector constructor.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {

        $this->order = $order;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getCollectedResult(): array
    {

        return [implode(' ', $this->order->getCommands())];

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function __toString(): string
    {

        return implode(' ', $this->order->getCommands());

    }

}