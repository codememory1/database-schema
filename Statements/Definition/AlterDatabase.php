<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Support\Str;

/**
 * Class AlterDatabase
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class AlterDatabase extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'ALTER';

    /**
     * @param string $dbname
     *
     * @return AlterDatabase
     */
    public function database(string $dbname): AlterDatabase
    {

        $this->addCommand('database', [$this->autoWrapAsReserved($dbname)]);

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return AlterDatabase
     */
    public function schema(string $dbname): AlterDatabase
    {

        $this->addCommand('schema', [$this->autoWrapAsReserved($dbname)]);

        return $this;

    }

    /**
     * @param string $collate
     *
     * @return AlterDatabase
     */
    public function collate(string $collate): AlterDatabase
    {

        $charset = Str::trimAfterSymbol($collate, '_');

        $this->addCommand('default character set', [$charset]);
        $this->addCommand('default collate', [$collate]);

        return $this;

    }

    /**
     * @param bool $encryption
     *
     * @return AlterDatabase
     */
    public function encryption(bool $encryption): AlterDatabase
    {

        $this->addCommand('default encryption', [$this->wrap($encryption ? 'Y' : 'N', '\'')]);

        return $this;

    }

    /**
     * @param string $read
     *
     * @return AlterDatabase
     */
    public function onlyRead(string $read = 'default'): AlterDatabase
    {

        $this->addCommand('read only', [Str::toUppercase($read)]);

        return $this;

    }

}