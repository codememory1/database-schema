<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class DropTable
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class DropTable extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'DROP';

    /**
     * @param string ...$tableNames
     *
     * @return $this
     */
    public function table(string ...$tableNames): DropTable
    {

        $tableNames = array_map(function (string $tableName) {
            return $this->autoWrapAsReserved($tableName);
        }, $tableNames);

        $this->addCommand('table if exists', [implode(',', $tableNames)]);

        return $this;

    }

    /**
     * @return $this
     */
    public function temp(): DropTable
    {

        $this->addCommand('temporary');

        return $this;

    }

    /**
     * @return $this
     */
    public function restrict(): DropTable
    {

        $this->addCommand('restrict');

        return $this;

    }

    /**
     * @return $this
     */
    public function cascade(): DropTable
    {

        $this->addCommand('cascade');

        return $this;

    }

}