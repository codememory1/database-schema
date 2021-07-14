<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\Collectors\ReferencesCollector;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Support\Str;

/**
 * Class ColumnParameters
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
final class ColumnParameters
{

    use ValueWrapperTrait;

    /**
     * @var string
     */
    private string $columnName;

    /**
     * @var array
     */
    private array $parameters = [];

    /**
     * @var array
     */
    private array $references = [];

    /**
     * ColumnParameters constructor.
     *
     * @param string $columnName
     */
    public function __construct(string $columnName)
    {

        $this->columnName = $columnName;

    }

    /**
     * @return ColumnParameters
     */
    public function notNull(): ColumnParameters
    {

        return $this->addParameter('not null');

    }

    /**
     * @return ColumnParameters
     */
    public function null(): ColumnParameters
    {

        return $this->addParameter('null');

    }

    /**
     * @param string $value
     *
     * @return ColumnParameters
     */
    public function defaultValue(string $value): ColumnParameters
    {

        return $this->addParameter('default', $this->autoWrapInQuotes($value, '\''));

    }

    /**
     * @return ColumnParameters
     */
    public function visible(): ColumnParameters
    {

        return $this->addParameter('visible');

    }

    /**
     * @return ColumnParameters
     */
    public function invisible(): ColumnParameters
    {

        return $this->addParameter('invisible');

    }

    /**
     * @return ColumnParameters
     */
    public function autoIncrement(): ColumnParameters
    {

        return $this->addParameter('auto_increment');

    }

    /**
     * @return ColumnParameters
     */
    public function unique(): ColumnParameters
    {

        return $this->addParameter('unique');

    }

    /**
     * @return ColumnParameters
     */
    public function primaryKey(): ColumnParameters
    {

        return $this->addParameter('primary key');

    }

    /**
     * @param string $value
     *
     * @return ColumnParameters
     */
    public function comment(string $value): ColumnParameters
    {

        return $this->addParameter('comment', $value);

    }

    /**
     * @param string $collate
     *
     * @return ColumnParameters
     */
    public function collate(string $collate): ColumnParameters
    {

        return $this->addParameter('collate', $collate);

    }

    /**
     * @param string $charset
     *
     * @return ColumnParameters
     */
    public function charset(string $charset): ColumnParameters
    {

        return $this->addParameter('charset set', $charset);

    }

    /**
     * @param string $format
     *
     * @return ColumnParameters
     */
    public function format(string $format): ColumnParameters
    {

        return $this->addParameter('column_format', Str::toUppercase($format));

    }

    /**
     * @param string $columnName
     *
     * @return ColumnParameters
     */
    public function after(string $columnName): ColumnParameters
    {

        return $this->addParameter('AFTER', $this->autoWrapInQuotes($columnName));

    }

    /**
     * @return ColumnParameters
     */
    public function first(): ColumnParameters
    {

        return $this->addParameter('FIRST');

    }

    /**
     * @param callable $callback
     *
     * @return References
     */
    public function references(callable $callback): References
    {

        $references = new References();

        call_user_func($callback, $references);

        $referencesCollector = new ReferencesCollector($references);

        $this->references[] = trim($referencesCollector->collect()->get());

        return $references;

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
    public function getReferences(): array
    {

        return $this->references;

    }

    /**
     * @param string      $operator
     * @param string|null $value
     *
     * @return ColumnParameters
     */
    private function addParameter(string $operator, ?string $value = null): ColumnParameters
    {

        $this->parameters[] = trim(sprintf('%s %s', Str::toUppercase($operator), $value));

        return $this;

    }

}