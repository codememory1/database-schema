<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\GroupInterface;

/**
 * Class Group
 *
 * @package Codememory\Components\Database\Schema\StatementComponents
 *
 * @author  Codememory
 */
class Group implements GroupInterface
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $command = [];

    /**
     * @inheritDoc
     */
    public function columns(string ...$columns): GroupInterface
    {

        $columns = array_map(function (mixed $column) {
            return $this->autoWrapAsReserved($column);
        }, $columns);

        $this->command[] = implode(',', $columns);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function withRollup(): GroupInterface
    {

        $this->command[] = 'WITH ROLLUP';

        return $this;

    }

    /**
     * @return array
     */
    public function getCommand(): array
    {

        return $this->command;

    }

}