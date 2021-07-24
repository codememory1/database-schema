<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\ComponentCreators\JoinCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\OrderCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\WhereCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Delete
 *
 * @package Codememory\Components\Database\Schema\ManipulationStatements
 *
 * @author  Codememory
 */
class Delete implements StatementInterface
{

    use ValueWrapperTrait;
    use WhereCreatorTrait;
    use OrderCreatorTrait;
    use LimitCreatorTrait;
    use JoinCreatorTrait;

    /**
     * @var array
     */
    private array $commands = [];

    /**
     * @return Delete
     */
    public function lowPriority(): Delete
    {

        $this->commands[] = 'LOW_PRIORITY';

        return $this;

    }

    /**
     * @return Delete
     */
    public function quick(): Delete
    {

        $this->commands[] = 'QUICK';

        return $this;

    }

    /**
     * @return Delete
     */
    public function ignore(): Delete
    {

        $this->commands[] = 'IGNORE';

        return $this;

    }

    /**
     * @param array $tables
     *
     * @return Delete
     */
    public function from(array $tables): Delete
    {

        $aliases = [];
        $collectedTables = [];

        foreach ($tables as $alias => $table) {
            $collectedTable = $this->autoWrapAsReserved($table);

            if (is_string($alias)) {
                $aliases[] = $this->autoWrapAsReserved($alias);
                $collectedTable .= sprintf(' AS %s', $this->autoWrapAsReserved($alias));
            }

            $collectedTables[] = $collectedTable;
        }

        if ([] !== $aliases) {
            $this->commands[] = implode(',', $aliases);
        }


        $this->commands[] = sprintf('FROM %s', implode(',', $collectedTables));

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return sprintf('DELETE %s', implode(' ', $this->commands));

    }

}