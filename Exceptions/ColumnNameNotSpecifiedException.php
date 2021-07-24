<?php

namespace Codememory\Components\Database\Schema\Exceptions;

use JetBrains\PhpStorm\Pure;

/**
 * Class ColumnNameNotSpecifiedException
 *
 * @package Codememory\Components\Database\Schema\Exceptions
 *
 * @author  Codememory
 */
class ColumnNameNotSpecifiedException extends SchemaException
{

    /**
     * ColumnNameNotSpecifiedException constructor.
     */
    #[Pure]
    public function __construct()
    {

        parent::__construct('Before specifying the type of the column, you need to initialize the name of the column being created.');

    }

}