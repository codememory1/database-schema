<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\ComponentCreators\GroupCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\HavingCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\JoinCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\OrderCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\WhereCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;
use JetBrains\PhpStorm\Pure;

/**
 * Class Select
 *
 * @package Codememory\Components\Database\Schema\Statements
 *
 * @author  Codememory
 */
class Select implements StatementInterface
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
     * @return Select
     */
    #[Pure]
    public function newObject(): Select
    {

        return clone new self();

    }

    /**
     * @param array $columns
     *
     * @return Select
     */
    public function columns(array $columns = []): Select
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
     * @return Select
     */
    public function all(): Select
    {

        $this->commands[] = 'ALL';

        return $this;

    }

    /**
     * @return Select
     */
    public function distinct(): Select
    {

        $this->commands[] = 'DISTINCT';

        return $this;

    }

    /**
     * @return Select
     */
    public function distinctrow(): Select
    {

        $this->commands[] = 'DISTINCTROW';

        return $this;

    }

    /**
     * @param string      $table
     * @param string|null $alias
     *
     * @return Select
     */
    public function from(string $table, ?string $alias = null): Select
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
    public function getQuery(): ?string
    {

        return sprintf('SELECT %s', implode(' ', $this->commands));

    }

}