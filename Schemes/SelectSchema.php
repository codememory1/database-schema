<?php

namespace Codememory\Components\Database\Schema\Schemes;

use Codememory\Components\Database\Schema\Creators\SelectCreator;

/**
 * Class SelectSchema
 *
 * @package Codememory\Components\Database\Schema\Schemes
 *
 * @author  Codememory
 */
final class SelectSchema extends AbstractSchema
{

    /**
     * @param SelectCreator $selectCreator
     *
     * @return SelectSchema
     */
    public function select(SelectCreator $selectCreator): SelectSchema
    {

        $this->addCommand('select', [$selectCreator->getCollector()->collect()->get()]);

        return $this;

    }

    /**
     * @param SelectCreator ...$selectCreators
     *
     * @return SelectSchema
     */
    public function union(SelectCreator ...$selectCreators): SelectSchema
    {

        $selects = [];

        foreach ($selectCreators as $selectCreator) {
            $selects[] = $selectCreator->getCollector()->collect()->get();
        }

        $this->addCommand('select', [implode(' UNION SELECT ', $selects)]);

        return $this;

    }

}