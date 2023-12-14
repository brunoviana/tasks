<?php

namespace Pyz\Zed\Tasks\Persistence\Mapper;

use Generated\Shared\Transfer\TaskTransfer;
use Orm\Zed\User\Persistence\PyzTask;

class TaskMapper
{
    public function mapTaskTransferToTaskEntity(TaskTransfer $taskTransfer, PyzTask $pyzTask): PyzTask
    {
        return $pyzTask->fromArray($taskTransfer->toArray());
    }

    public function mapTaskEntityToTaskTransfer(PyzTask $pyzTask, TaskTransfer $taskTransfer): TaskTransfer
    {
        return $taskTransfer->fromArray($pyzTask->toArray(), true);
    }
}
