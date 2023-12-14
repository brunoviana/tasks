<?php

namespace Pyz\Zed\Tasks\Business;

use Generated\Shared\Transfer\TaskResponseTransfer;
use Generated\Shared\Transfer\TaskTransfer;

interface TasksFacadeInterface
{
    public function createTask(TaskTransfer $taskTransfer): TaskResponseTransfer;
}
