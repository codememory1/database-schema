<?php

namespace Codememory\Components\Database\Schema\Helpers;

use JetBrains\PhpStorm\Pure;

/**
 * Trait ValueWrapperTrait
 *
 * @package Codememory\Components\Database\Schema\Helpers
 *
 * @author  Codememory
 */
trait ValueWrapperTrait
{

    /**
     * @param string|int|float $value
     *
     * @return string
     */
    #[Pure]
    public function asReserved(string|int|float $value): string
    {

        return $this->wrap($value, '`');

    }

    /**
     * @param string|int|float $value
     *
     * @return string
     */
    #[Pure]
    public function asValue(string|int|float $value): string
    {

        return $this->wrap($value, '\'');

    }

    /**
     * @param string|int|float $value
     *
     * @return string
     */
    public function autoWrapAsReserved(string|int|float $value): string
    {

        return $this->autoWrap($value, '`');

    }

    /**
     * @param string|int|float $value
     *
     * @return string
     */
    public function autoWrapAsValue(string|int|float $value): string
    {

        return $this->autoWrap($value, '\'');

    }

    /**
     * @param string|int|float $value
     * @param string           $wrapper
     *
     * @return string
     */
    public function autoWrap(string|int|float $value, string $wrapper): string
    {

        if (preg_match('/[.]+/', $value)
            || preg_match('/^:/', $value)
            || preg_match('/^[0-9]+$/', $value)
            || preg_match('/^([0-9]+\s*(\+|-|\*|%|\**\/)\s*[0-9]+)+$/', $value)
            || preg_match('/^[A-Z_-]+\([^)]*\)$/', $value)
            || preg_match('/^\([\s\S]+?\)$/', $value)) {
            return $value;
        }

        return sprintf('%1$s%2$s%1$s', $wrapper, $value);

    }

    /**
     * @param string|int|float $value
     * @param string           $wrapper
     *
     * @return string
     */
    public function wrap(string|int|float $value, string $wrapper): string
    {

        return sprintf('%1$s%2$s%1$s', $wrapper, $value);

    }

}