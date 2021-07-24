<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

/**
 * Class Rename
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class Rename extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'ALTER';

    /**
     * @param string $tableName
     *
     * @return Rename
     */
    public function table(string $tableName): Rename
    {

        $this->addCommand('table', [$this->autoWrapAsReserved($tableName)]);

        return $this;

    }

    /**
     * @param string $newTableName
     *
     * @return Rename
     */
    public function renameTable(string $newTableName): Rename
    {

        $this->addCommand('rename to', [$this->autoWrapAsReserved($newTableName)]);

        return $this;

    }

    /**
     * @param string $oldColumnName
     * @param string $newColumnName
     *
     * @return Rename
     */
    public function renameColumn(string $oldColumnName, string $newColumnName): Rename
    {

        $this->addCommand('rename column', [
            $this->autoWrapAsReserved($oldColumnName),
            'TO',
            $this->autoWrapAsReserved($newColumnName)
        ]);

        return $this;

    }

    /**
     * @param string $oldIndexName
     * @param string $newIndexName
     *
     * @return Rename
     */
    public function renameIndex(string $oldIndexName, string $newIndexName): Rename
    {

        $this->addCommand('rename index', [
            $this->autoWrapAsReserved($oldIndexName),
            'TO',
            $this->autoWrapAsReserved($newIndexName)
        ]);

        return $this;

    }

    /**
     * @param string $oldKeyName
     * @param string $newKeyName
     *
     * @return Rename
     */
    public function renameKey(string $oldKeyName, string $newKeyName): Rename
    {

        $this->addCommand('rename index', [
            $this->autoWrapAsReserved($oldKeyName),
            'TO',
            $this->autoWrapAsReserved($newKeyName)
        ]);

        return $this;

    }

}