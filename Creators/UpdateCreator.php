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
 * Class UpdateCreator
 *
 * @package Codememory\Components\Database\Schema\Creators
 *
 * @author  Codememory
 */
final class UpdateCreator implements CreatorInterface, CommandsCreatorInterface
{

    use ValueWrapperTrait;
    use StatementComponentsTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param string $tableName
     *
     * @return UpdateCreator
     */
    public function table(string $tableName): UpdateCreator
    {

        return $this->addCommand(null, [$this->autoWrapInQuotes($tableName)]);

    }

    /**
     * @param array $columnsWithValues
     *
     * @return UpdateCreator
     */
    public function set(array $columnsWithValues): UpdateCreator
    {

        $set = [];

        foreach ($columnsWithValues as $columnName => $value) {
            $set[] = sprintf('%s = \'%s\'', $this->autoWrapInQuotes($columnName), $value);
        }

        return $this->addCommand('set', [implode(',', $set)]);

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
     * @return UpdateCreator
     */
    private function addCommand(?string $command, array $parameters = []): UpdateCreator
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