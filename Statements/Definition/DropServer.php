<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class DropServer
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class DropServer extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'DROP';

    /**
     * @param string $serverName
     *
     * @return $this
     */
    public function server(string $serverName): DropServer
    {

        $this->addCommand('server if exists', [$this->autoWrapAsReserved($serverName)]);

        return $this;

    }

}