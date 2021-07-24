<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class CreateTrigger
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class CreateTrigger extends AbstractDefinition
{

    /**
     * @param string $name
     *
     * @return $this
     */
    public function trigger(string $name): CreateTrigger
    {

        $this->addCommand('trigger', [$this->autoWrapAsReserved($name)]);

        return $this;

    }

    /**
     * @param string $user
     *
     * @return $this
     */
    public function definer(string $user): CreateTrigger
    {

        $this->addCommand('definer', ['=', $this->wrap($user, '\'')]);

        return $this;

    }

    /**
     * @param string $time
     *
     * @return $this
     */
    public function time(string $time): CreateTrigger
    {

        $this->addCommand($time);

        return $this;

    }

    /**
     * @param string $event
     *
     * @return $this
     */
    public function event(string $event): CreateTrigger
    {

        $this->addCommand($event);

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return $this
     */
    public function on(string $tableName): CreateTrigger
    {

        $this->addCommand('ON', [$this->autoWrapAsReserved($tableName)]);
        $this->addCommand('for each row');

        return $this;

    }

    /**
     * @param string $order
     *
     * @return $this
     */
    public function order(string $order): CreateTrigger
    {

        $this->addCommand($order);

        return $this;

    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function body(string $body): CreateTrigger
    {

        $this->commands[] = $body;

        return $this;

    }

}