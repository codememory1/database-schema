<?php

namespace Codememory\Components\Database\Schema\Interfaces;

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
     * @return ColumnOptionsInterface
     */
    public function array(): ColumnOptionsInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnOptionsInterface
     */
    public function asciiString(?int $length = null): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function bigInteger(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function binary(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function blob(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function boolean(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function date(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function dateImmutable(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function dateInterval(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function datetime(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function datetimeImmutable(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function datetimeTZ(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function datetimeTZImmutable(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function time(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function timeImmutable(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function decimal(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function float(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function guid(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function integer(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function json(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function object(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function simpleArray(): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function smallint(): ColumnOptionsInterface;

    /**
     * @param int|null $length
     *
     * @return ColumnOptionsInterface
     */
    public function string(?int $length = null): ColumnOptionsInterface;

    /**
     * @return ColumnOptionsInterface
     */
    public function text(): ColumnOptionsInterface;

}