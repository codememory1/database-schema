<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\ColumnParameters;
use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;

/**
 * Class ColumnParametersCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class ColumnParametersCollector implements CollectorInterface
{

    /**
     * @var ColumnParameters
     */
    private ColumnParameters $columnParameters;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * ColumnParametersCollector constructor.
     *
     * @param ColumnParameters $columnParameters
     */
    public function __construct(ColumnParameters $columnParameters)
    {

        $this->columnParameters = $columnParameters;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $this->collectorResult = implode(' ', $this->columnParameters->getParameters());

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