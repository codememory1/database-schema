<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Creators\WhereCreator;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;

/**
 * Class WhereCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class WhereCollector implements CollectorInterface
{

    /**
     * @var WhereCreator
     */
    private WhereCreator $whereCreator;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * WhereCollector constructor.
     *
     * @param WhereCreator $whereCreator
     */
    public function __construct(WhereCreator $whereCreator)
    {

        $this->whereCreator = $whereCreator;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $collectorExpressions = [];
        $commandsWithOperator = $this->whereCreator->getCommands();

        foreach ($commandsWithOperator as $commands) {
            unset($commands[array_key_last($commands)]);

            foreach ($commands as $command) {
                $collectorExpressions[] = $command;
            }
        }

        if ([] !== $collectorExpressions) {
            unset($collectorExpressions[array_key_first($collectorExpressions)]);
        }

        $this->collectorResult = implode(' ', $collectorExpressions);

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