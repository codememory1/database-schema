<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Support\Str;

/**
 * Class CreateIndex
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class CreateIndex extends AbstractDefinition
{

    /**
     * @var array
     */
    private array $columns = [];

    /**
     * @param string $indexName
     *
     * @return $this
     */
    public function index(string $indexName): CreateIndex
    {

        $this->addCommand('index', [$this->autoWrapAsReserved($indexName)]);

        return $this;

    }

    /**
     * @return $this
     */
    public function unique(): CreateIndex
    {

        $this->addCommand('unique');

        return $this;

    }

    /**
     * @return $this
     */
    public function fulltext(): CreateIndex
    {

        $this->addCommand('fulltext');

        return $this;

    }

    /**
     * @return $this
     */
    public function spatial(): CreateIndex
    {

        $this->addCommand('spatial');

        return $this;

    }

    /**
     * @param string $tableName
     *
     * @return $this
     */
    public function on(string $tableName): CreateIndex
    {

        $columnsToString = implode(',', $this->columns);

        $this->addCommand('ON', [$this->autoWrapAsReserved($tableName), sprintf('(%s)', $columnsToString)]);

        return $this;

    }

    /**
     * @param string      $name
     * @param string|null $lengthOrExpression
     * @param string      $as
     *
     * @return $this
     */
    public function addColumn(string $name, ?string $lengthOrExpression = null, string $as = 'asc'): CreateIndex
    {

        $columnToString = $this->autoWrapAsReserved($name);

        if (null !== $lengthOrExpression) {
            $columnToString .= sprintf('(%s)', $lengthOrExpression);
        }

        $columnToString .= Str::toUppercase($as);

        $this->columns[] = $columnToString;

        return $this;

    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function comment(string $comment): CreateIndex
    {

        $this->addCommand('comment', [$this->wrap($comment, '\'')]);

        return $this;

    }

    /**
     * @return $this
     */
    public function visible(): CreateIndex
    {

        $this->addCommand('visible');

        return $this;

    }

    /**
     * @return $this
     */
    public function invisible(): CreateIndex
    {

        $this->addCommand('invisible');

        return $this;

    }

    /**
     * @param string $using
     *
     * @return $this
     */
    public function using(string $using): CreateIndex
    {

        $this->addCommand('using', [Str::toUppercase($using)]);

        return $this;

    }

    /**
     * @param string $algorithm
     *
     * @return $this
     */
    public function algorithm(string $algorithm): CreateIndex
    {

        $this->addCommand('algorithm', [Str::toUppercase($algorithm)]);

        return $this;

    }

    /**
     * @param string $lock
     *
     * @return $this
     */
    public function lock(string $lock): CreateIndex
    {

        $this->addCommand('lock', [Str::toUppercase($lock)]);

        return $this;

    }

}