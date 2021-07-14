<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Support\Str;
use JetBrains\PhpStorm\Pure;

/**
 * Class ColumnDefinition
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
final class ColumnDefinition
{

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var array
     */
    private array $parameters;

    /**
     * @var array
     */
    private array $values;

    /**
     * ColumnDefinition constructor.
     *
     * @param string $type
     * @param string $name
     * @param array  $parameters
     * @param array  $values
     */
    #[Pure]
    public function __construct(string $type, string $name, array $parameters, array $values)
    {

        $this->type = Str::toUppercase($type);
        $this->name = $name;
        $this->parameters = $parameters;
        $this->values = $values;

    }

    /**
     * @return string
     */
    public function getType(): string
    {

        return $this->type;

    }

    /**
     * @return string
     */
    public function getName(): string
    {

        return $this->name;

    }

    /**
     * @return array
     */
    public function getParameters(): array
    {

        return $this->parameters;

    }

    /**
     * @return array
     */
    public function getValues(): array
    {

        return $this->values;

    }

}