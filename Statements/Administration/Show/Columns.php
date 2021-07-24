<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Columns
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Columns extends AbstractShow
{

    /**
     * @var string
     */
    protected string $type = 'COLUMNS';

    /**
     * @return Columns
     */
    public function columns(): Columns
    {

        $this->commands[] = 'COLUMNS';

        return $this;

    }

    /**
     * @return Columns
     */
    public function fields(): Columns
    {

        $this->commands[] = 'FIELDS';

        return $this;

    }

    /**
     * @return Columns
     */
    public function extended(): Columns
    {

        $this->commands[] = 'EXTENDED';

        return $this;

    }

    /**
     * @return Columns
     */
    public function full(): Columns
    {

        $this->commands[] = 'FULL';

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return Columns
     */
    public function from(string $tableName): Columns
    {

        $this->commands[] = sprintf('FROM %s', $this->autoWrapAsReserved($tableName));

        return $this;

    }

    /**
     * @param string $dbname
     *
     * @return Columns
     */
    public function in(string $dbname): Columns
    {

        $this->commands[] = sprintf('IN %s', $this->autoWrapAsReserved($dbname));

        return $this;

    }

}