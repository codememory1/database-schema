<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Support\Str;

/**
 * Class CreateDatabase
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class CreateDatabase extends AbstractDefinition
{

    /**
     * @param string $dbname
     *
     * @return $this
     */
    public function database(string $dbname): CreateDatabase
    {

        $this->addCommand('database if not exists', [$this->autoWrapAsReserved($dbname)]);

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return $this
     */
    public function schema(string $dbname): CreateDatabase
    {

        $this->addCommand('schema if not exists', [$this->autoWrapAsReserved($dbname)]);

        return $this;

    }

    /**
     * @param string $collate
     *
     * @return $this
     */
    public function collate(string $collate): CreateDatabase
    {

        $charset = Str::trimAfterSymbol($collate, '_');

        $this->addCommand('default character set', [$charset]);
        $this->addCommand('collate', [$collate]);

        return $this;

    }

    /**
     * @param bool $encryption
     *
     * @return $this
     */
    public function encryption(bool $encryption): CreateDatabase
    {

        $this->addCommand('encryption', [$this->wrap($encryption ? 'Y' : 'N', '\'')]);

        return $this;

    }

}