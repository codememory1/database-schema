<?php

namespace Codememory\Components\Database\Schema\Creators;

use Codememory\Components\Database\Schema\Collectors\ToStringCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CommandsCreatorInterface;
use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Components\Database\Schema\JoinParameters;
use Codememory\Components\Database\Schema\StatementComponentsTrait;
use Codememory\Support\Str;
use JetBrains\PhpStorm\Pure;

/**
 * Class SelectCreator
 *
 * @package Codememory\Components\Database\Schema\Creators
 *
 * @author  Codememory
 */
final class SelectCreator implements CreatorInterface, CommandsCreatorInterface
{

    use ValueWrapperTrait;
    use StatementComponentsTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @return SelectCreator
     */
    public function all(): SelectCreator
    {

        return $this->addCommand('all', []);

    }

    /**
     * @return SelectCreator
     */
    public function distinct(): SelectCreator
    {

        return $this->addCommand('distinct', []);

    }

    /**
     * @return SelectCreator
     */
    public function distinctRow(): SelectCreator
    {

        return $this->addCommand('distinct', []);

    }

    /**
     * @param array $columns
     *
     * @return SelectCreator
     */
    public function columns(array $columns = []): SelectCreator
    {

        if ([] === $columns) {
            $this->addCommand('*', []);
        } else {
            $columnsPerRow = null;

            foreach ($columns as $as => $column) {
                $columnsPerRow .= $this->autoWrapInQuotes($column);
                $columnsPerRow .= is_string($as) ? sprintf(' AS `%s`', $as) : null;
                $columnsPerRow .= ',';
            }

            $this->addCommand(null, [mb_substr($columnsPerRow, 0, -1)]);
        }

        return $this;

    }

    /**
     * @param string      $tableName
     * @param string|null $alias
     *
     * @return SelectCreator
     */
    public function from(string $tableName, ?string $alias = null): SelectCreator
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
     * @return SelectCreator
     */
    private function addCommand(?string $command, array $parameters = []): SelectCreator
    {

        if (null !== $command) {
            $this->commands[] = Str::toUppercase($command);
        }

        if ([] !== $parameters) {
            $this->commands[] = implode(' ', $parameters);
        }

        return $this;

    }

    /**
     * @param string        $command
     * @param array         $tables
     * @param callable|null $specification
     */
    private function join(string $command, array $tables, ?callable $specification = null): void
    {

        $tableReference = null;
        $specificationToString = null;

        foreach ($tables as $alias => $table) {
            $tableReference .= $this->autoWrapInQuotes($table);

            if(is_string($alias)) {
                $tableReference .= sprintf(' AS %s', $this->autoWrapInQuotes($alias));
            }

            $tableReference .= ',';
        }

        if(null !== $specification) {
            $joinParameters = new JoinParameters();

            call_user_func($specification, $joinParameters);

            $specificationToString = $joinParameters->getCommand();
        }

        $this->addCommand($command, [
            sprintf('(%s)', mb_substr($tableReference, 0, -1)),
            $specificationToString
        ]);

    }

}