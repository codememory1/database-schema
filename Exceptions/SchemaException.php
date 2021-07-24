<?php

namespace Codememory\Components\Database\Schema\Exceptions;

use ErrorException;
use JetBrains\PhpStorm\Pure;

/**
 * Class SchemaException
 *
 * @package Codememory\Components\Database\Schema\Exceptions
 *
 * @author  Codememory
 */
abstract class SchemaException extends ErrorException
{

    /**
     * SchemaException constructor.
     *
     * @param string $message
     */
    #[Pure]
    public function __construct(string $message = '')
    {

        parent::__construct($message);

    }

}