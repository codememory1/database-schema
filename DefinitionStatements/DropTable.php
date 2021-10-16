<?php

namespace Codememory\Components\Database\Schema\DefinitionStatements;

use Codememory\Components\Database\Schema\Interfaces\DropTableInterface;
use Doctrine\DBAL\Schema\Table;

/**
 * Class DropTable
 *
 * @package Codememory\Components\Database\Schema\DefinitionStatements
 *
 * @author  Codememory
 */
class DropTable implements DropTableInterface
{

    /**
     * @var Table
     */
    private Table $table;

    /**
     * @param Table $table
     */
    public function __construct(Table $table)
    {

        $this->table = $table;

    }

    /**
     * @inheritDoc
     */
    public function isTemp(): DropTableInterface
    {

        $this->table->addOption('temporary', true);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function withRestrict(): DropTableInterface
    {

        $this->table->addOption('restrict', true);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function withCascade(): DropTableInterface
    {

        $this->table->addOption('cascade', true);

        return $this;

    }

}