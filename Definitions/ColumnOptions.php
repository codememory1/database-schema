<?php

namespace Codememory\Components\Database\Schema\Definitions;

use Codememory\Components\Database\Schema\Interfaces\ColumnOptionsInterface;
use Codememory\Components\Database\Schema\Interfaces\DefinitionDataInterface;

/**
 * Class ColumnOptions
 *
 * @package Codememory\Components\Database\Schema\Definitions
 *
 * @author  Codememory
 */
class ColumnOptions implements ColumnOptionsInterface, DefinitionDataInterface
{

    /**
     * @var array
     */
    private array $data = [];

    /**
     * @inheritDoc
     */
    public function precision(int $value): ColumnOptionsInterface
    {

        $this->data['precision'] = $value;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function scale(int $value): ColumnOptionsInterface
    {

        $this->data['scale'] = $value;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function unsigned(bool $unsigned = true): ColumnOptionsInterface
    {

        $this->data['unsigned'] = $unsigned;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function fixed(bool $fixed = true): ColumnOptionsInterface
    {

        $this->data['fixed'] = $fixed;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function nullable(bool $nullable = true): ColumnOptionsInterface
    {

        $this->data['nullable'] = $nullable;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function default(mixed $value): ColumnOptionsInterface
    {

        $this->data['default'] = $value;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function autoincrement(): ColumnOptionsInterface
    {

        $this->data['autoincrement'] = true;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function primary(string $indexName = 'primary'): ColumnOptionsInterface
    {

        $this->data['primary'] = true;
        $this->data['primaryIndexName'] = $indexName;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function comment(string $value): ColumnOptionsInterface
    {

        $this->data['comment'] = $value;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function foreign(callable $callback): ColumnOptionsInterface
    {

        $foreign = new Foreign();

        call_user_func($callback, $foreign);

        $this->data['foreign'] = $foreign;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getSQLData(): array
    {

        return $this->data;

    }

}