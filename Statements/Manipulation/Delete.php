<?php

namespace Codememory\Components\Database\Schema\Statements\Manipulation;

use Codememory\Components\Database\Schema\ComponentCreators\JoinCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\OrderCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\WhereCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\DeleteInterface;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class Delete
 *
 * @package Codememory\Components\Database\Schema\ManipulationStatements
 *
 * @author  Codememory
 */
class Delete implements StatementInterface, DeleteInterface
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
     * @inheritDoc
     */
    public function delete(): DeleteInterface
    {

        $this->commands[] = 'DELETE';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function lowPriority(): DeleteInterface
    {

        $this->commands[] = 'LOW_PRIORITY';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function quick(): DeleteInterface
    {

        $this->commands[] = 'QUICK';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function ignore(): DeleteInterface
    {

        $this->commands[] = 'IGNORE';

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function from(array $tables): DeleteInterface
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

        return implode(' ', $this->commands);

    }

}