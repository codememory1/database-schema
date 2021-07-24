<?php

namespace Codememory\Components\Database\Schema\Collectors;

use Codememory\Components\Database\Schema\Interfaces\CollectorInterface;
use Codememory\Components\Database\Schema\StatementComponents\Reference;

/**
 * Class ReferenceCollector
 *
 * @package Codememory\Components\Database\Schema\Collectors
 *
 * @author  Codememory
 */
class ReferenceCollector implements CollectorInterface
{

    /**
     * @var Reference
     */
    private Reference $reference;

    /**
     * ReferenceCollector constructor.
     *
     * @param Reference $reference
     */
    public function __construct(Reference $reference)
    {

        $this->reference = $reference;

    }

    /**
     * @return array
     */
    public function getCollectedResult(): array
    {

        $references = [];

        foreach ($this->reference->getReferences() as $reference) {
            $definition = $reference->getDefinition();
            $referenceToString = null;

            if (null !== $definition['constraint']) {
                $referenceToString = sprintf('CONSTRAINT %s ', $definition['constraint']);
            }

            $referenceToString .= sprintf('FOREIGN KEY (%s)', implode(',', $definition['foreign']));

            if ([] !== $definition['internal']) {
                $referenceToString .= sprintf(' REFERENCES %s(%s)', $definition['table'], implode(',', $definition['internal']));
            }

            if ([] !== $definition['actions']) {
                $referenceToString .= sprintf(' %s', implode(' ', $definition['actions']));
            }

            $references[] = $referenceToString;
        }

        return $references;

    }

    /**
     * @return string
     */
    public function __toString(): string
    {

        return implode(',', $this->getCollectedResult());

    }

}