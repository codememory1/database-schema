<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Interfaces\ColumnDefinitionInterface;
use Codememory\Support\Str;

/**
 * Class ColumnDefinition
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class ColumnDefinition implements ColumnDefinitionInterface
{

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function constraint(string $name): ColumnDefinitionInterface
    {

        return $this->addCommand('constraint', [$name]);

    }

    /**
     * @inheritDoc
     */
    public function notNull(): ColumnDefinitionInterface
    {

        return $this->addCommand('not null');

    }

    /**
     * @inheritDoc
     */
    public function null(): ColumnDefinitionInterface
    {

        return $this->addCommand('null');

    }

    /**
     * @inheritDoc
     */
    public function default(string $value): ColumnDefinitionInterface
    {

        return $this->addCommand('default', [$value]);

    }

    /**
     * @inheritDoc
     */
    public function visible(): ColumnDefinitionInterface
    {

        return $this->addCommand('visible');

    }

    /**
     * @inheritDoc
     */
    public function invisible(): ColumnDefinitionInterface
    {

        return $this->addCommand('invisible');

    }

    /**
     * @inheritDoc
     */
    public function increment(): ColumnDefinitionInterface
    {

        return $this->addCommand('auto_increment');

    }

    /**
     * @inheritDoc
     */
    public function primary(): ColumnDefinitionInterface
    {

        return $this->addCommand('primary key');

    }

    /**
     * @inheritDoc
     */
    public function unique(): ColumnDefinitionInterface
    {

        return $this->addCommand('unique');

    }

    /**
     * @inheritDoc
     */
    public function comment(string $comment): ColumnDefinitionInterface
    {

        return $this->addCommand('comment', [$comment]);

    }

    /**
     * @inheritDoc
     */
    public function character(string $charset): ColumnDefinitionInterface
    {

        $this->addCommand('character set', [$charset]);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function collate(string $collate): ColumnDefinitionInterface
    {

        $this->addCommand('collate', [$collate]);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function collateWithCharacter(string $collate): ColumnDefinitionInterface
    {

        $charset = Str::trimAfterSymbol($collate, '_');

        $this->addCommand('character set', [$charset]);
        $this->addCommand('collate', [$collate]);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function format(string $format): ColumnDefinitionInterface
    {

        return $this->addCommand('column_format', [$format]);

    }

    /**
     * @inheritDoc
     */
    public function storage(string $storage): ColumnDefinitionInterface
    {

        return $this->addCommand('storage', [$storage]);

    }

    /**
     * @inheritDoc
     */
    public function first(): ColumnDefinitionInterface
    {

        return $this->addCommand('first');

    }

    /**
     * @inheritDoc
     */
    public function after(string $columnName): ColumnDefinitionInterface
    {

        return $this->addCommand('after', [$columnName]);

    }

    /**
     * @return array
     */
    public function getCommands(): array
    {

        return $this->commands;

    }

    /**
     * @param string $command
     * @param array  $parameters
     *
     * @return ColumnDefinitionInterface
     */
    private function addCommand(string $command, array $parameters = []): ColumnDefinitionInterface
    {

        $parametersToString = implode(' ', $parameters);

        $commands = [
            Str::toUppercase($command)
        ];

        if (!empty($parametersToString)) {
            $commands[] = $parametersToString;
        }

        $this->commands[] = $commands;

        return $this;

    }

}