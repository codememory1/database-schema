<?php

namespace Codememory\Components\Database\Schema\Constants;

/**
 * Class RowFormat
 *
 * @package Codememory\Components\Database\Schema\Constants
 *
 * @author  Codememory
 */
abstract class RowFormat
{

    public const DEFAULT = 'default';
    public const DYNAMIC = 'dynamic';
    public const FIXED = 'fixed';
    public const COMPRESSED = 'compressed';
    public const REDUNDANT = 'redundant';
    public const COMPACT = 'compact';

}