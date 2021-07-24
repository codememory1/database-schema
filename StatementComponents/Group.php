<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;

/**
 * Class Group
 *
 * @package Codememory\Components\Database\Schema\StatementComponents
 *
 * @author  Codememory
 */
class Group
{

    use ValueWrapperTrait;

    /**
     * @var array
     */
    private array $command = [];

    /**
     * @param string ...$columns
     *
     * @return $this
     */
    public function columns(string ...$columns): Group
    {

        $columns = array_map(function (mixed $column) {
            return $this->autoWrapAsReserved($column);
        }, $columns);

        $this->command[] = implode(',', $columns);

        return $this;

    }

    /**
     * @return Group
     */
    public function withRollup(): Group
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