<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Support\Str;

/**
 * Class AlterServer
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class AlterServer extends AbstractDefinition
{

    /**
     * @var string
     */
    protected string $typeDefinition = 'ALTER';

    /**
     * @param string $serverName
     *
     * @return AlterServer
     */
    public function server(string $serverName): AlterServer
    {

        $this->addCommand('server', [$this->autoWrapAsReserved($serverName)]);

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
     * @return AlterServer
     */
    public function options(?string $host = null,
                            ?string $db = null,
                            ?string $user = null,
                            ?string $password = null,
                            ?string $socket = null,
                            ?string $owner = null,
                            ?int $port = null): AlterServer
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