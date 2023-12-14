<?php

namespace Pyz\Zed\Tasks\Persistence;

use Generated\Shared\Transfer\StoreTransfer;
use Generated\Shared\Transfer\TaskTransfer;

interface TasksEntityManagerInterface
{
    public function createTask(TaskTransfer $taskTransfer): TaskTransfer;

    public function updateTask(TaskTransfer $taskTransfer): ?TaskTransfer;
}
