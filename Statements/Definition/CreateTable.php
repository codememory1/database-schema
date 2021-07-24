<?php

namespace Codememory\Components\Database\Schema\Statements\Definition;

use Codememory\Components\Database\Schema\Collectors\ColumnCollector;
use Codememory\Components\Database\Schema\Collectors\ReferenceCollector;
use Codememory\Components\Database\Schema\Interfaces\ColumnInterface;
use Codememory\Components\Database\Schema\Interfaces\ReferenceInterface;
use Codememory\Support\Str;

/**
 * Class CreateTable
 *
 * @package Codememory\Components\Database\Schema\Statements\Definition
 *
 * @author  Codememory
 */
class CreateTable extends AbstractDefinition
{

    /**
     * @return $this
     */
    public function table(string $tableName): CreateTable
    {

        $this->addCommand('table if not exists', [$this->autoWrapAsReserved($tableName)]);

        return $this;

    }

    /**
     * @return $this
     */
    public function temp(): CreateTable
    {

        $this->addCommand('TEMPORARY');

        return $this;

    }

    /**
     * @param ColumnInterface         $column
     * @param ReferenceInterface|null $reference
     *
     * @return $this
     */
    public function columns(ColumnInterface $column, ?ReferenceInterface $reference = null): CreateTable
    {

        $columns = new ColumnCollector($column);

        if (null !== $reference) {
            $references = new ReferenceCollector($reference);
            $columns .= sprintf(', %s', $references);
        }

        $this->addCommand('', [sprintf('(%s)', $columns)]);

        return $this;

    }

    /**
     * @param string $collate
     *
     * @return $this
     */
    public function collate(string $collate): CreateTable
    {

        $charset = Str::trimAfterSymbol($collate, '_');

        $this->addCommand('default character set', [$charset]);
        $this->addCommand('collate', [$collate]);

        return $this;

    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function comment(string $comment): CreateTable
    {

        $this->addCommand('COMMENT', [$this->wrap($comment, '\'')]);

        return $this;

    }

    /**
     * @param string $connectionName
     *
     * @return $this
     */
    public function connection(string $connectionName): CreateTable
    {

        $this->addCommand('connection', [$this->wrap($connectionName, '\'')]);

        return $this;

    }

    /**
     * @param string $engine
     *
     * @return $this
     */
    public function engine(string $engine = 'InnoDB'): CreateTable
    {

        $this->addCommand('ENGINE', [$engine]);

        return $this;

    }

    /**
     * @param bool $encryption
     *
     * @return $this
     */
    public function encryption(bool $encryption): CreateTable
    {

        $this->addCommand('encryption', [$this->wrap($encryption ? 'Y' : 'N', '\'')]);

        return $this;

    }

    /**
     * @param string $format
     *
     * @return $this
     */
    public function rowFormat(string $format): CreateTable
    {

        $this->addCommand('row_format', [Str::toUppercase($format)]);

        return $this;

    }


}