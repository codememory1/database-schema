<?php

namespace Codememory\Components\Database\Schema\Definitions;

use Codememory\Components\Database\Schema\Interfaces\DefinitionDataInterface;
use Codememory\Components\Database\Schema\Interfaces\ForeignInterface;

/**
 * Class Foreign
 *
 * @package Codememory\Components\Database\Schema\Definitions
 *
 * @author  Codememory
 */
class Foreign implements ForeignInterface, DefinitionDataInterface
{

    public const RESTRICT = 'RESTRICT';
    public const CASCADE = 'CASCADE';
    public const SET_NULL = 'SET NULL';
    public const NO_ACTION = 'NO ACTION';
    public const SET_DEFAULT = 'SET DEFAULT';

    /**
     * @var array
     */
    private array $data = [
        'constraint'    => null,
        'table'         => null,
        'localColumn'   => null,
        'foreignColumn' => null,
        'options'       => []
    ];

    /**
     * @inheritDoc
     */
    public function setConstraint(string $name): ForeignInterface
    {

        $this->data['constraint'] = $name;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function foreignTable(string $name): ForeignInterface
    {

        $this->data['table'] = $name;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function localColumn(string $name): ForeignInterface
    {

        $this->data['localColumn'] = $name;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function foreignColumn(string $name): ForeignInterface
    {

        $this->data['foreignColumn'] = $name;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function onDelete(string $action): ForeignInterface
    {

        $this->data['options']['DELETE'] = $action;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function onUpdate(string $action): ForeignInterface
    {

        $this->data['options']['UPDATE'] = $action;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getSQLData(): array
    {

        return $this->data;

    }

}