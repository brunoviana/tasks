<?php

namespace Pyz\Zed\Tasks\Persistence;

use Generated\Shared\Transfer\StoreTransfer;
use Generated\Shared\Transfer\TaskTransfer;

interface TasksEntityManagerInterface
{
    public function saveTask(TaskTransfer $taskTransfer): TaskTransfer;
}
