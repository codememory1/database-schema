<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

/**
 * Class Index
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  Codememory
 */
class Index extends AbstractShow
{

    /**
     * @return Index
     */
    public function index(): Index
    {

        $this->commands[] = 'INDEX';

        return $this;

    }

    /**
     * @return Index
     */
    public function indexes(): Index
    {

        $this->commands[] = 'INDEXES';

        return $this;

    }

    /**
     * @return Index
     */
    public function keys(): Index
    {

        $this->commands[] = 'KEYS';


        return $this;

    }

    /**
     * @return Index
     */
    public function extended(): Index
    {

        $this->commands[] = 'EXTENDED';

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return Index
     */
    public function from(string $tableName): Index
    {

        $this->commands[] = sprintf('FROM %s', $this->autoWrapAsReserved($tableName));

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return Index
     */
    public function in(string $tableName): Index
    {

        $this->commands[] = sprintf('IN %s', $this->autoWrapAsReserved($tableName));

        return $this;

    }

}