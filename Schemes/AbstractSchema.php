<?php

namespace Codememory\Components\Database\Schema\Schemes;

use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Support\Str;

/**
 * Class AbstractSchema
 *
 * @package Codememory\Components\Database\Schema\Schemes
 *
 * @author  Codememeory
 */
abstract class AbstractSchema
{

    /**
     * @var array
     */
    protected array $command = [
        'command'    => null,
        'parameters' => null,
        'creator'    => null
    ];

    /**
     * @return array
     */
    public function getCommand(): array
    {

        return $this->command;

    }

    /**
     * @param string                $command
     * @param array                 $parameters
     * @param CreatorInterface|null $creator
     */
    protected function addCommand(string $command, array $parameters, ?CreatorInterface $creator = null): void
    {

        $this->command = [
            'command'    => Str::toUppercase($command),
            'parameters' => [] !== $parameters ? sprintf(' %s', implode(' ', $parameters)) : null,
            'creator'    => $creator
        ];

    }

}