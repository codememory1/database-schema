<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\ComponentCreators\GroupCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\HavingCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\JoinCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\OrderCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\WhereCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\SelectInterface;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Select
 *
 * @package Codememory\Components\Database\Schema\Statements
 *
 * @author  Codememory
 */
class Select implements StatementInterface, SelectInterface
{

    use ValueWrapperTrait;
    use WhereCreatorTrait;
    use GroupCreatorTrait;
    use HavingCreatorTrait;
    use JoinCreatorTrait;
    use LimitCreatorTrait;
    use OrderCreatorTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @inheritDoc
     */
    public function select(): SelectInterface
    {

        $this->commands[] = 'SELECT';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function columns(array $columns = []): SelectInterface
    {

        $collectedNameColumns = [];

        foreach ($columns as $alias => $name) {
            if (is_string($alias)) {
                $collectedNameColumns[] = sprintf('%s AS %s', $this->autoWrapAsReserved($name), $alias);
            } else {
                $collectedNameColumns[] = $this->autoWrapAsReserved($name);
            }
        }

        $collectedNameColumnsToString = implode(',', $collectedNameColumns);

        $this->commands[] = empty($collectedNameColumnsToString) ? '*' : $collectedNameColumnsToString;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function all(): SelectInterface
    {

        $this->commands[] = 'ALL';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function distinct(): SelectInterface
    {

        $this->commands[] = 'DISTINCT';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function distinctrow(): SelectInterface
    {

        $this->commands[] = 'DISTINCTROW';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function from(string $table, ?string $alias = null): SelectInterface
    {

        $from = $this->autoWrapAsReserved($table);

        if (null !== $alias) {
            $from .= sprintf(' AS %s', $alias);
        }

        $this->commands[] = sprintf('FROM %s', $from);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function union(): SelectInterface
    {

        $this->commands[] = 'UNION';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return implode(' ', $this->commands);

    }

}