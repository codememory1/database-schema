<?php

namespace Codememory\Components\Database\Schema\Creators;

use Codememory\Components\Database\Schema\Collectors\ToStringCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CommandsCreatorInterface;
use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Support\Str;
use JetBrains\PhpStorm\Pure;

/**
 * Class InsertCreator
 *
 * @package Codememory\Components\Database\Schema\Creators
 *
 * @author  Codememory
 */
final class InsertCreator implements CreatorInterface, CommandsCreatorInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @param string $tableName
     *
     * @return InsertCreator
     */
    public function table(string $tableName): InsertCreator
    {

        return $this->addCommand(null, [$this->autoWrapInQuotes($tableName)]);

    }

    /**
     * @param array $columns
     *
     * @return InsertCreator
     */
    public function columns(array $columns): InsertCreator
    {

        $columns = array_map(function (mixed $value) {
            return $this->autoWrapInQuotes($value);
        }, $columns);

        return $this->addCommand(null, [sprintf('(%s)', implode(',', $columns))]);

    }

    /**
     * @param array $values
     *
     * @return InsertCreator
     */
    public function values(array $values): InsertCreator
    {

        $values = array_map(function (mixed $value) {
            return $this->wrapInQuotes($value);
        }, $values);

        return $this->addCommand('values', [sprintf('(%s)', implode(',', $values))]);

    }

    /**
     * @inheritDoc
     */
    public function getCommands(): array
    {

        return $this->commands;

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
     * @param string|null $command
     * @param array       $parameters
     *
     * @return InsertCreator
     */
    private function addCommand(?string $command, array $parameters = []): InsertCreator
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