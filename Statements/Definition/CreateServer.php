<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Support\Str;

/**
 * Class CreateServer
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class CreateServer extends AbstractDefinition
{

    /**
     * @param string $serverName
     *
     * @return $this
     */
    public function server(string $serverName): CreateServer
    {

        $this->addCommand('server', [$this->autoWrapAsReserved($serverName)]);

        return $this;

    }

    /**
     * @param string $wrapperName
     *
     * @return $this
     */
    public function wrapper(string $wrapperName): CreateServer
    {

        $this->addCommand('foreign data wrapper', [$this->autoWrapAsReserved($wrapperName)]);

        return $this;

    }

    /**
     * @param string|null $host
     * @param string|null $db
     * @param string|null $user
     * @param string|null $password
     * @param string|null $socket
     * @param string|null $owner
     * @param int|null    $port
     *
     * @return $this
     */
    public function options(?string $host = null,
                            ?string $db = null,
                            ?string $user = null,
                            ?string $password = null,
                            ?string $socket = null,
                            ?string $owner = null,
                            ?int $port = null): CreateServer
    {

        $options = [];

        $this->addOption('host', $host, $options);
        $this->addOption('database', $db, $options);
        $this->addOption('user', $user, $options);
        $this->addOption('password', $password, $options);
        $this->addOption('socket', $socket, $options);
        $this->addOption('owner', $owner, $options);
        $this->addOption('port', $port, $options);

        $this->addCommand('options', [sprintf('(%s)', implode(',', $options))]);

        return $this;

    }

    /**
     * @param string          $option
     * @param string|int|null $value
     * @param array           $options
     *
     * @return void
     */
    private function addOption(string $option, null|string|int $value, array &$options): void
    {

        if (null !== $value) {
            $value = is_string($value) ? $this->wrap($value, '\'') : $value;

            $options[] = sprintf('%s %s', Str::toUppercase($option), $value);
        }

    }

}