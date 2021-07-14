<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Schema\Creators\WhereCreator;
use Codememory\Components\Database\Schema\Helpers\ValueWrapperTrait;
use Codememory\Components\Database\Schema\Interfaces\JoinParametersInterface;
use Codememory\Support\Str;

/**
 * Class JoinParameters
 *
 * @package Codememory\Components\Database\Schema\Parameters
 *
 * @author  Codememory
 */
class JoinParameters implements JoinParametersInterface
{

    use ValueWrapperTrait;

    /**
     * @var string|null
     */
    private ?string $command = null;

    /**
     * @inheritDoc
     */
    public function on(WhereCreator $whereCreator): JoinParameters
    {

        return $this->addCommand('on', [
            sprintf('(%s)', $whereCreator->getCollector()->collect()->get())
        ]);

    }

    /**
     * @inheritDoc
     */
    public function using(array $columns): JoinParameters
    {

        $columns = array_map(function (mixed $value) {
            return $this->autoWrapInQuotes($value);
        }, $columns);

        return $this->addCommand('using', [
            sprintf('(%s)', implode(',', $columns))
        ]);

    }

    /**
     * @param string $command
     * @param array  $parameters
     *
     * @return JoinParameters
     */
    public function addCommand(string $command, array $parameters): JoinParameters
    {

        $this->command = sprintf('%s %s', Str::toUppercase($command), implode(' ', $parameters));

        return $this;

    }

    /**
     * @return string|null
     */
    public function getCommand(): ?string
    {

        return $this->command;

    }

}