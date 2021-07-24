<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;
use Codememory\Support\Str;

/**
 * Class AbstractDefinition
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
abstract class AbstractDefinition implements StatementInterface
{

    use ValueWrapperTrait;
    use LimitCreatorTrait;

    /**
     * @var string
     */
    protected string $typeDefinition = 'CREATE';

    /**
     * @var array
     */
    protected array $commands = [];

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return sprintf('%s %s', $this->typeDefinition, implode(' ', $this->commands));

    }

    /**
     * @param string $command
     * @param array  $parameters
     *
     * @return void
     */
    protected function addCommand(string $command, array $parameters = []): void
    {

        $parametersToString = implode(' ', $parameters);

        $commands = [
            Str::toUppercase($command)
        ];

        if (!empty($parametersToString)) {
            $commands[] = $parametersToString;
        }

        foreach ($commands as $index => $command) {
            if(empty($command)) {
                unset($commands[$index]);
            }
        }

        $this->commands = array_merge($this->commands, $commands);

    }

}