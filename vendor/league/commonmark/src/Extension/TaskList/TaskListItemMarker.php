<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\TaskList;

<<<<<<< HEAD
use League\CommonMark\Inline\Element\AbstractInline;

final class TaskListItemMarker extends AbstractInline
{
    /** @var bool */
    protected $checked = false;

    public function __construct(bool $isCompleted)
    {
=======
use League\CommonMark\Node\Inline\AbstractInline;

final class TaskListItemMarker extends AbstractInline
{
    /** @psalm-readonly-allow-private-mutation */
    private bool $checked;

    public function __construct(bool $isCompleted)
    {
        parent::__construct();

>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
        $this->checked = $isCompleted;
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }

<<<<<<< HEAD
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
=======
    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
>>>>>>> c238f31813060ef49682ad19f809d8d0d25aaaf7
    }
}
