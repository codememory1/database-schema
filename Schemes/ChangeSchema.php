<?php

namespace Codememory\Components\Database\Schema\Schemes;

use Codememory\Components\Database\Schema\Creators\DeleteCreator;
use Codememory\Components\Database\Schema\Creators\InsertCreator;
use Codememory\Components\Database\Schema\Creators\UpdateCreator;

/**
 * Class ChangeSchema
 *
 * @package Codememory\Components\Database\Schema\Schemes
 *
 * @author  Codememory
 */
final class ChangeSchema extends AbstractSchema
{

    /**
     * @param UpdateCreator $updateCreator
     *
     * @return ChangeSchema
     */
    public function update(UpdateCreator $updateCreator): ChangeSchema
    {

        $this->addCommand('update', [$updateCreator->getCollector()->collect()->get()]);

        return $this;

    }

    /**
     * @param InsertCreator $insertCreator
     *
     * @return ChangeSchema
     */
    public function insert(InsertCreator $insertCreator): ChangeSchema
    {

        $this->addCommand('insert into', [$insertCreator->getCollector()->collect()->get()]);

        return $this;

    }

    /**
     * @param DeleteCreator $deleteCreator
     *
     * @return ChangeSchema
     */
    public function delete(DeleteCreator $deleteCreator): ChangeSchema
    {

        $this->addCommand('delete', [$deleteCreator->getCollector()->collect()->get()]);

        return $this;

    }

}