<?php

namespace Codememory\Components\Database\Schema\StatementComponents;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\ReferenceDefinitionInterface;
use Codememory\Support\Str;

/**
 * Class ReferenceDefinition
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class ReferenceDefinition implements ReferenceDefinitionInterface
{

    use ValueWrapperTrait;

    public const RD_RESTRICT = 'RESTRICT';
    public const RD_CASCADE = 'CASCADE';
    public const RD_SET_NULL = 'SET NULL';
    public const RD_NO_ACTION = 'NO ACTION';
    public const RD_SET_DEFAULT = 'SET DEFAULT';

    /**
     * @var array
     */
    private array $definition = [
        'constraint' => null,
        'foreign'    => [],
        'table'      => null,
        'internal'   => [],
        'actions'    => []
    ];

    /**
     * @inheritDoc
     */
    public function constraint(string $name): ReferenceDefinitionInterface
    {

        $this->definition['constraint'] = $this->autoWrapAsReserved($name);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function foreignKeys(string ...$keys): ReferenceDefinitionInterface
    {

        $this->definition['foreign'] = $this->getWrappedKeys($keys);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function table(string $table): ReferenceDefinitionInterface
    {

        $this->definition['table'] = $table;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function internalKeys(string ...$keys): ReferenceDefinitionInterface
    {

        $this->definition['internal'] = $this->getWrappedKeys($keys);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function onUpdate(string $option): ReferenceDefinitionInterface
    {

        $this->addAction('update', $option);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function onDelete(string $option): ReferenceDefinitionInterface
    {

        $this->addAction('delete', $option);

        return $this;

    }

    /**
     * @return array
     */
    public function getDefinition(): array
    {

        return $this->definition;

    }

    /**
     * @param array $keys
     *
     * @return array
     */
    private function getWrappedKeys(array $keys): array
    {

        return array_map(function (mixed $key) {
            return $this->autoWrapAsReserved($key);
        }, $keys);

    }

    /**
     * @param string $action
     * @param string $option
     *
     * @return void
     */
    private function addAction(string $action, string $option): void
    {

        $this->definition['actions'][] = sprintf('ON %s %s', Str::toUppercase($action), Str::toUppercase($option));

    }

}