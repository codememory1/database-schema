<?php

namespace Codememory\Components\Database\Schema\Creators;

use Codememory\Components\Database\Schema\Collectors\ToStringCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CommandsCreatorInterface;
use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Components\Database\Schema\StatementComponentsTrait;
use Codememory\Support\Str;
use JetBrains\PhpStorm\Pure;

/**
 * Class DeleteCreator
 *
 * @package Codememory\Components\Database\Schema\Creators
 *
 * @author  Codememory
 */
final class DeleteCreator implements CreatorInterface, CommandsCreatorInterface
{

    use ValueWrapperTrait;
    use StatementComponentsTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param string      $tableName
     * @param string|null $alias
     *
     * @return DeleteCreator
     */
    public function table(string $tableName, ?string $alias = null): DeleteCreator
    {

        $this->addCommand('from', [$this->autoWrapInQuotes($tableName)]);

        if (null !== $alias) {
            $this->addCommand('as', [$this->autoWrapInQuotes($alias)]);
        }

        return $this;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getCollector(): CollectorInterface
    {

        return new ToStringCollector($this);

    }

    /**
     * @return array
     */
    public function getCommands(): array
    {

        return $this->commands;

    }

    /**
     * @param string|null $command
     * @param array       $parameters
     *
     * @return DeleteCreator
     */
    private function addCommand(?string $command, array $parameters = []): DeleteCreator
    {

        if (null !== $command) {
            $this->commands[] = Str::toUppercase($command);
        }

        if ([] !== $parameters) {
            $this->commands[] = implode(' ', $parameters);
        }

        return $this;

    }

}