<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Support\Str;

/**
 * Class References
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
final class References
{

    public const EO_RESTRICT = 'RESTRICT';
    public const EO_CASCADE = 'CASCADE';
    public const EO_SET_NULL = 'SET NULL';
    public const EO_NO_ACTION = 'NO ACTION';
    public const EO_SET_DEFAULT = 'SET DEFAULT';

    /**
     * @var array
     */
    private array $foreignColumns = [];

    /**
     * @var string|null
     */
    private ?string $referencesTableName = null;

    /**
     * @var array
     */
    private array $referencesColumns = [];

    /**
     * @var array
     */
    private array $options = [];

    /**
     * @param array $columns
     *
     * @return References
     */
    public function foreignColumns(array $columns): References
    {

        $this->foreignColumns = $columns;

        return $this;

    }

    /**
     * @return array
     */
    public function getForeignColumns(): array
    {

        return $this->foreignColumns;

    }

    /**
     * @param string $tableName
     * @param array  $columns
     *
     * @return References
     */
    public function references(string $tableName, array $columns): References
    {

        $this->referencesTableName = $tableName;
        $this->referencesColumns = $columns;

        return $this;

    }

    /**
     * @return null|string
     */
    public function getReferencesTableName(): ?string
    {

        return $this->referencesTableName;

    }

    /**
     * @return array
     */
    public function getReferencesColumns(): array
    {

        return $this->referencesColumns;

    }

    /**
     * @param string $option
     *
     * @return References
     */
    public function onUpdate(string $option): References
    {

        return $this->addOption('update', $option);

    }

    /**
     * @param string $option
     *
     * @return References
     */
    public function onDelete(string $option): References
    {

        return $this->addOption('delete', $option);

    }

    /**
     * @return array
     */
    public function getOptions(): array
    {

        return $this->options;

    }

    /**
     * @param string $event
     * @param string $option
     *
     * @return References
     */
    private function addOption(string $event, string $option): References
    {

        $this->options[] = sprintf('ON %s %s', Str::toUppercase($event), Str::toUppercase($option));

        return $this;

    }

}