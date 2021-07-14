<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\References;

/**
 * Class ReferencesCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class ReferencesCollector implements CollectorInterface
{

    use ValueWrapperTrait;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * @var References
     */
    private References $references;

    /**
     * ReferencesCollector constructor.
     *
     * @param References $references
     */
    public function __construct(References $references)
    {

        $this->references = $references;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $foreignColumns = array_map(function (mixed $value) {
            return $this->wrapInQuotes($value, '`');
        }, $this->references->getForeignColumns());
        $referencesColumns = array_map(function (mixed $value) {
            return $this->wrapInQuotes($value, '`');
        }, $this->references->getReferencesColumns());

        $foreign = [
            sprintf('REFERENCES %s(%s)', $this->references->getReferencesTableName(), implode(',', $referencesColumns)),
            implode(' ', $this->references->getOptions())
        ];

        if([] !== $foreignColumns) {
            array_unshift($foreign, sprintf('FOREIGN KEY (%s)', implode(',', $foreignColumns)));
        }

        $this->collectorResult = implode(' ', $foreign);

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function get(): ?string
    {

        return $this->collectorResult;

    }

}