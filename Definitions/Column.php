<?php

namespace Codememory\Components\Database\Schema\Definitions;

use Codememory\Components\Database\Schema\Definitions\Kits\ColumnsKit;
use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Components\Database\Schema\Interfaces\ColumnsKitInterface;
use Codememory\Components\Database\Schema\Interfaces\DefinitionDataInterface;
use JetBrains\PhpStorm\Pure;

/**
 * Class Column
 *
 * @package Codememory\Components\Database\Schema\Definitions
 *
 * @author  Codememory
 */
class Column implements ColumnInterface, DefinitionDataInterface
{

    /**
     * @var array
     */
    private array $data = [];

    /**
     * @inheritDoc
     */
    public function kit(): ColumnsKitInterface
    {

        $columnsKit = new ColumnsKit();

        $this->data = array_merge($this->data, [$columnsKit]);

        return $columnsKit;

    }

    /**
     * @inheritDoc
     */
    public function create(string $name, callable $callback): ColumnInterface
    {

        $data = [
            'name'       => $name,
            'definition' => null
        ];

        $columnType = new ColumnType();

        call_user_func($callback, $columnType);

        $data['definition'] = $columnType;
        $this->data[] = $data;

        return $this;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getSQLData(): array
    {

        $data = [];

        foreach ($this->data as $column) {
            if ($column instanceof ColumnsKitInterface) {
                $data = array_merge($data, $column->getSQLData());
            } else {
                $data[] = $column;
            }
        }

        return $data;

    }

}