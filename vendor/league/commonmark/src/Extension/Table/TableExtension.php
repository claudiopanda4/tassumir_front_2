<?php

declare(strict_types=1);

/*
 * This is part of the league/commonmark package.
 *
 * (c) Martin Hasoň <martin.hason@gmail.com>
 * (c) Webuni s.r.o. <info@webuni.cz>
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\Table;

<<<<<<< HEAD
use League\CommonMark\ConfigurableEnvironmentInterface;
=======
use League\CommonMark\Environment\EnvironmentBuilderInterface;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
use League\CommonMark\Extension\ExtensionInterface;

final class TableExtension implements ExtensionInterface
{
<<<<<<< HEAD
    public function register(ConfigurableEnvironmentInterface $environment): void
    {
        $environment
            ->addBlockParser(new TableParser())

            ->addBlockRenderer(Table::class, new TableRenderer())
            ->addBlockRenderer(TableSection::class, new TableSectionRenderer())
            ->addBlockRenderer(TableRow::class, new TableRowRenderer())
            ->addBlockRenderer(TableCell::class, new TableCellRenderer())
        ;
=======
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment
            ->addBlockStartParser(new TableStartParser())

            ->addRenderer(Table::class, new TableRenderer())
            ->addRenderer(TableSection::class, new TableSectionRenderer())
            ->addRenderer(TableRow::class, new TableRowRenderer())
            ->addRenderer(TableCell::class, new TableCellRenderer());
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
