<?php

namespace Codememory\Components\Database\Schema\Helpers;

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
     * @param mixed  $value
     * @param string $quote
     *
     * @return string
     */
    public function wrapInQuotes(mixed $value, string $quote = '\''): string
    {

        $value = (string) $value;

        return sprintf('%1$s%2$s%1$s', $quote, $value);

    }

    /**
     * @param mixed  $value
     * @param string $quote
     *
     * @return string
     */
    public function autoWrapInQuotes(mixed $value, string $quote = '`'): string
    {

        if (preg_match('/[.]+/', $value) || preg_match('/^:/', $value)) {
            return $value;
        }

        return sprintf('%1$s%2$s%1$s', $quote, $value);

    }

}