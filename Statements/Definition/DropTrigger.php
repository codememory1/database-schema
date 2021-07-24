<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class DropTrigger
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class DropTrigger extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'DROP';

    /**
     * @param string $triggerName
     *
     * @return $this
     */
    public function trigger(string $triggerName): DropTrigger
    {

        $this->addCommand('trigger if exists', [$this->autoWrapAsReserved($triggerName)]);

        return $this;

    }

}