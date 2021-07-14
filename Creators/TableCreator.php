<?php

namespace Codememory\Components\Database\Schema\Creators;

use Codememory\Components\Database\Schema\Collectors\ColumnCollector;
use Codememory\Components\Database\Schema\Collectors\TableCollector;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Components\Database\Schema\Interfaces\TableCreatorInterface;
use JetBrains\PhpStorm\Pure;

/**
 * Class TableCreator
 *
 * @package Codememory\Components\Database\Schema\Creators
 *
 * @author  Codememory
 */
final class TableCreator implements TableCreatorInterface, CreatorInterface
{

    /**
     * @var ColumnCollector|null
     */
    private ?ColumnCollector $columnCollector;

    /**
     * @var string
     */
    private string $charset = 'utf8';

    /**
     * @var string
     */
    private string $collate = 'utf8_general_ci';

    /**
     * @var string
     */
    private string $engine = 'InnoDB';

    /**
     * TableCreator constructor.
     *
     * @param ColumnCollector|null $columnCollector
     */
    #[Pure]
    public function __construct(?ColumnCollector $columnCollector = null)
    {

        $this->columnCollector = $columnCollector;

    }

    /**
     * @inheritDoc
     */
    public function setCharset(string $charset): TableCreator
    {

        $this->charset = $charset;

        return $this;

    }

    /**
     * @return string
     */
    public function getCollate(): string
    {

        return $this->collate;

    }

    /**
     * @inheritDoc
     */
    public function setCollate(string $collate): TableCreator
    {

        $this->collate = $collate;

        return $this;

    }

    /**
     * @return string
     */
    public function getCharset(): string
    {

        return $this->charset;

    }

    /**
     * @param string $engine
     *
     * @return TableCreator
     */
    public function setEngine(string $engine): TableCreator
    {

        $this->engine = $engine;

        return $this;

    }

    /**
     * @return string
     */
    public function getEngine(): string
    {

        return $this->engine;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getCollector(): CollectorInterface
    {

        return new TableCollector($this, $this->columnCollector);

    }

}