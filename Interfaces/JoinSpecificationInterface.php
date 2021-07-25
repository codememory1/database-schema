<?php

namespace Codememory\Components\Database\Schema\Interfaces;

/**
 * Interface JoinSpecificationInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface JoinSpecificationInterface
{

    /**
     * @param ExpressionInterface $expression
     *
     * @return string
     */
    public function on(ExpressionInterface $expression): string;

    /**
     * @param array $columns
     *
     * @return string
     */
    public function using(array $columns): string;

}