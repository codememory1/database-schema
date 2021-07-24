<?php

namespace Codememory\Components\Database\Schema;

use Codememory\Components\Database\Connection\Interfaces\ConnectorInterface;

/**
 * Class Schema
 *
 * @package Codememory\Components\Database\Schema
 *
 * @author  Codememory
 */
class Schema
{

    /**
     * @var ConnectorInterface
     */
    private ConnectorInterface $connector;

    /**
     * @var string
     */
    private string $driverName;

    /**
     * Schema constructor.
     *
     * @param ConnectorInterface $connector
     */
    public function __construct(ConnectorInterface $connector)
    {

        $this->connector = $connector;
        $this->driverName = $connector->getConnectorData()->getDriver()->getDriverName();

    }



}