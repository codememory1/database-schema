<?php

namespace Codememory\Components\Database\Schema\Exceptions;

use ErrorException;
use JetBrains\PhpStorm\Pure;

/**
 * Class NotInitColumnException
 *
 * @package Codememory\Components\Database\Schema\Exceptions
 *
 * @author  Codememory
 */
class NotInitColumnException extends ErrorException
{

    /**
     * NotInitColumnException constructor.
     */
    #[Pure]
    public function __construct()
    {

        parent::__construct('Column not initialized');

    }

}