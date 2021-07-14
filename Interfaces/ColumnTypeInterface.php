<?php

namespace Codememory\Components\Database\Schema\Interfaces;

use Codememory\Components\Database\Schema\ColumnParameters;

/**
 * Interface ColumnTypeInterface
 *
 * @package Codememory\Components\Database\Schema\Interfaces
 *
 * @author  Codememory
 */
interface ColumnTypeInterface
{

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function char(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function varchar(int $length): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function json(): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function binary(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function varbinary(int $length): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function tinyblob(): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function tinytext(): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function text(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function blob(int $length): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function mediumtext(): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function mediumblob(): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function longtext(): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function longblob(): ColumnParameters;

    /**
     * @param int|float|string ...$values
     *
     * @return ColumnParameters
     */
    public function enum(int|float|string ...$values): ColumnParameters;

    /**
     * @param int|float|string ...$values
     *
     * @return ColumnParameters
     */
    public function set(int|float|string ...$values): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function bit(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function tinyint(int $length): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function bool(): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function boolean(): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function smallint(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function mediumint(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function int(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function integer(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function bigint(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function float(int $length): ColumnParameters;

    /**
     * @param int $length
     *
     * @return ColumnParameters
     */
    public function double(int $length): ColumnParameters;

    /**
     * @param int $length
     * @param int      $afterPoint
     *
     * @return ColumnParameters
     */
    public function decimal(int $length, int $afterPoint = 3): ColumnParameters;

    /**
     * @param int $length
     * @param int      $afterPoint
     *
     * @return ColumnParameters
     */
    public function desc(int $length, int $afterPoint = 3): ColumnParameters;

    /**
     * @param string $format
     *
     * @return ColumnParameters
     */
    public function datetime(string $format = 'YYYY-MM-DD hh:mm:ss'): ColumnParameters;

    /**
     * @param string $format
     *
     * @return ColumnParameters
     */
    public function timestamp(string $format = 'YYYY-MM-DD hh:mm:ss'): ColumnParameters;

    /**
     * @param string $format
     *
     * @return ColumnParameters
     */
    public function time(string $format = 'hh:mm:ss'): ColumnParameters;

    /**
     * @return ColumnParameters
     */
    public function year(): ColumnParameters;

}