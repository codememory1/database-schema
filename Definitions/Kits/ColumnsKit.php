<?php

namespace Codememory\Components\Database\Schema\Definitions\Kits;

use Codememory\Components\Database\Schema\Definitions\ColumnType;
use Codememory\Components\Database\Schema\Interfaces\ColumnsKitInterface;
use Codememory\Components\Database\Schema\Interfaces\DefinitionDataInterface;

/**
 * Class ColumnsKit
 *
 * @package Codememory\Components\Database\Schema\Definitions\Kits
 *
 * @author  Codememory
 */
class ColumnsKit implements ColumnsKitInterface, DefinitionDataInterface
{

    /**
     * @var array
     */
    private array $data = [];

    /**
     * @inheritDoc
     */
    public function id(): void
    {

        $columnTypeId = new ColumnType();
        $columnTypeId
            ->bigInteger()
            ->autoincrement()
            ->primary()
            ->comment('Unique record identifier');

        $this->data[] = [
            'name'       => 'id',
            'definition' => $columnTypeId
        ];

    }

    /**
     * @inheritDoc
     */
    public function timestamps(): void
    {

        $columnTypeCreatedAt = new ColumnType();
        $columnTypeCreatedAt
            ->datetime()
            ->default('CURRENT_TIMESTAMP')
            ->comment('Date the entry was created');

        $columnTypeUpdatedAt = new ColumnType();
        $columnTypeUpdatedAt
            ->datetime()
            ->nullable(true)
            ->default('NULL')
            ->comment('Record update date');

        $this->data[] = [
            'name'       => 'created_at',
            'definition' => $columnTypeCreatedAt
        ];
        $this->data[] = [
            'name'       => 'updated_at',
            'definition' => $columnTypeUpdatedAt
        ];

    }

    /**
     * @inheritDoc
     */
    public function getSQLData(): array
    {

        return $this->data;

    }

}