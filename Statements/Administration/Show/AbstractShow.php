<?php

namespace Codememory\Components\Database\Schema\Statements\Administration\Show;

use Codememory\Components\Database\Schema\ComponentCreators\GroupCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\HavingCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\LimitCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\OrderCreatorTrait;
use Codememory\Components\Database\Schema\ComponentCreators\WhereCreatorTrait;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\StatementInterface;

/**
 * Class AbstractShow
 *
 * @package Codememory\Components\Database\Schema\Statements\Administration\Show
 *
 * @author  COdememory
 */
abstract class AbstractShow implements StatementInterface
{

    use ValueWrapperTrait;
    use WhereCreatorTrait;
    use HavingCreatorTrait;
    use LimitCreatorTrait;
    use OrderCreatorTrait;
    use GroupCreatorTrait;

    /**
     * @var array
     */
    protected array $commands = [];

    /**
     * @inheritDoc
     */
    public function getQuery(): ?string
    {

        return sprintf('SHOW %s', implode(' ', $this->commands));

    }

}