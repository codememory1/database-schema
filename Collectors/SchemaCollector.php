<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\Interfaces\CreatorInterface;
use Codememory\Components\Database\Schema\Schemes\AbstractSchema;

/**
 * Class SchemaCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
final class SchemaCollector implements CollectorInterface
{

    /**
     * @var AbstractSchema
     */
    private AbstractSchema $schema;

    /**
     * @var string|null
     */
    private ?string $collectorResult = null;

    /**
     * SchemaCollector constructor.
     *
     * @param AbstractSchema $schema
     */
    public function __construct(AbstractSchema $schema)
    {

        $this->schema = $schema;

    }

    /**
     * @inheritDoc
     */
    public function collect(): CollectorInterface
    {

        $command = $this->schema->getCommand();

        $this->collectorResult = $command['command'];
        $this->collectorResult .= $command['parameters'];

        if($command['creator'] instanceof CreatorInterface) {
            $this->collectorResult .= $command['creator']->getCollector()->collect()->get();
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

}