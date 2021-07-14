<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CommandsCreatorInterface;

/**
 * Class ToStringCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class ToStringCollector implements CollectorInterface
{

    /**
     * @var CommandsCreatorInterface
     */
    private CommandsCreatorInterface $creator;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * ToStringCollector constructor.
     *
     * @param CommandsCreatorInterface $creator
     */
    public function __construct(CommandsCreatorInterface $creator)
    {

        $this->creator = $creator;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $this->collectorResult = implode(' ', $this->creator->getCommands());

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function get(): ?string
    {

        return $this->collectorResult;

    }

}