<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Column;
use Codememory\Components\Database\Schema\ColumnDefinition;
use Codememory\Components\Database\Schema\ColumnParameters;
use Codememory\Components\Database\Schema\Creators\ColumnCreator;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;

/**
 * Class ColumnCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class ColumnCollector implements CollectorInterface
{

    use ValueWrapperTrait;

    /**
     * @var ColumnCreator
     */
    private ColumnCreator $column;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * ColumnCollector constructor.
     *
     * @param ColumnCreator $column
     */
    public function __construct(ColumnCreator $column)
    {

        $this->column = $column;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $columns = [];
        $references = [];

        foreach ($this->column->getColumns() as $column) {
            /** @var ColumnDefinition $columnDefinition */
            $columnDefinition = $column['definition'];
            /** @var ColumnParameters $columnParameters */
            $columnParameters = $column['parameters'];
            $columnTypeCollector = new ColumnTypeCollector($columnDefinition);
            $columnParametersCollector = new ColumnParametersCollector($columnParameters);

            $references[] = $columnParameters->getReferences();
            $columns[] = sprintf(
                '%s %s %s',
                $this->autoWrapInQuotes($columnDefinition->getName()),
                $columnTypeCollector->collect()->get(),
                $columnParametersCollector->collect()->get()
            );
        }

        $this->filterReferences($references);
        $referencesToString = implode(',', $references);

        $this->collectorResult = trim(sprintf('%s', implode(',', $columns)));

        if(!empty($referencesToString)) {
            $this->collectorResult .= sprintf(', %s', implode(',', $references));
        }

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function get(): ?string
    {

        return $this->collectorResult;

    }

    /**
     * @param array $references
     */
    private function filterReferences(array &$references): void
    {

        foreach ($references as $key => $reference) {
            if([] !== $reference) {
                $references[] = $reference[0];
            }

            unset($references[$key]);
        }

    }

}