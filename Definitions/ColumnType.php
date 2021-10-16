<?php

namespace Codememory\Components\Database\Schema\Definitions;

use Codememory\Components\Database\Schema\Interfaces\ColumnOptionsInterface;
use Codememory\Components\Database\Schema\Interfaces\ColumnTypeInterface;
use Codememory\Components\Database\Schema\Interfaces\DefinitionDataInterface;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\DBAL\Types\AsciiStringType;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\BinaryType;
use Doctrine\DBAL\Types\BlobType;
use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\DateImmutableType;
use Doctrine\DBAL\Types\DateIntervalType;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateTimeTzImmutableType;
use Doctrine\DBAL\Types\DateTimeTzType;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\GuidType;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\JsonType;
use Doctrine\DBAL\Types\ObjectType;
use Doctrine\DBAL\Types\SimpleArrayType;
use Doctrine\DBAL\Types\SmallIntType;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\TimeImmutableType;
use Doctrine\DBAL\Types\TimeType;
use JetBrains\PhpStorm\Pure;

/**
 * Class ColumnType
 *
 * @package Codememory\Components\Database\Schema\Definitions
 *
 * @author  Codememory
 */
class ColumnType implements ColumnTypeInterface, DefinitionDataInterface
{

    /**
     * @var array
     */
    private array $data = [
        'type'    => null,
        'length'  => null,
        'options' => null
    ];

    /**
     * @var ColumnOptions
     */
    private ColumnOptions $columnOptions;

    #[Pure]
    public function __construct()
    {

        $this->columnOptions = new ColumnOptions();

    }

    /**
     * @inheritDoc
     */
    public function array(): ColumnOptionsInterface
    {

        $this->data['type'] = new ArrayType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function asciiString(?int $length = null): ColumnOptionsInterface
    {

        $this->data['type'] = new AsciiStringType();
        $this->data['length'] = $length;
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function bigInteger(): ColumnOptionsInterface
    {

        $this->data['type'] = new BigIntType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function binary(): ColumnOptionsInterface
    {

        $this->data['type'] = new BinaryType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function blob(): ColumnOptionsInterface
    {

        $this->data['type'] = new BlobType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function boolean(): ColumnOptionsInterface
    {

        $this->data['type'] = new BooleanType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function date(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function dateImmutable(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateImmutableType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function dateInterval(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateIntervalType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function datetime(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateTimeType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function datetimeImmutable(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateTimeImmutableType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function datetimeTZ(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateTimeTzType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function datetimeTZImmutable(): ColumnOptionsInterface
    {

        $this->data['type'] = new DateTimeTzImmutableType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function time(): ColumnOptionsInterface
    {

        $this->data['type'] = new TimeType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function timeImmutable(): ColumnOptionsInterface
    {

        $this->data['type'] = new TimeImmutableType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function decimal(): ColumnOptionsInterface
    {

        $this->data['type'] = new DecimalType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function float(): ColumnOptionsInterface
    {

        $this->data['type'] = new FloatType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function guid(): ColumnOptionsInterface
    {

        $this->data['type'] = new GuidType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function integer(): ColumnOptionsInterface
    {

        $this->data['type'] = new IntegerType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function json(): ColumnOptionsInterface
    {

        $this->data['type'] = new JsonType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function object(): ColumnOptionsInterface
    {

        $this->data['type'] = new ObjectType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function simpleArray(): ColumnOptionsInterface
    {

        $this->data['type'] = new SimpleArrayType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function smallint(): ColumnOptionsInterface
    {

        $this->data['type'] = new SmallIntType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function string(?int $length = null): ColumnOptionsInterface
    {

        $this->data['type'] = new StringType();
        $this->data['length'] = $length;
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function text(): ColumnOptionsInterface
    {

        $this->data['type'] = new TextType();
        $this->data['options'] = $this->columnOptions;

        return $this->columnOptions;

    }

    /**
     * @inheritDoc
     */
    public function getSQLData(): array
    {

        return $this->data;

    }

}