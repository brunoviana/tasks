<?php

namespace Pyz\Zed\Tasks\Persistence;

use Generated\Shared\Transfer\StoreTransfer;
use Generated\Shared\Transfer\TaskTransfer;
use Orm\Zed\User\Persistence\PyzTask;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Pyz\Zed\Tasks\Persistence\TasksPersistenceFactory getFactory()
 */
class TasksEntityManager extends AbstractEntityManager implements TasksEntityManagerInterface
{
    public function createTask(TaskTransfer $taskTransfer): TaskTransfer
    {
        $taskMapper = $this->getFactory()->createTaskMapper();

        $taskEntity = $taskMapper->mapTaskTransferToTaskEntity(
            $taskTransfer,
            new PyzTask()
        );

        $taskEntity->save();

        return $taskMapper->mapTaskEntityToTaskTransfer($taskEntity, new TaskTransfer());
    }

    public function updateTask(TaskTransfer $taskTransfer): ?TaskTransfer
    {
        $taskTransfer->requireIdTask();

        $taskEntity = $this->getFactory()
            ->createTaskQuery()
            ->filterByIdTask($taskTransfer->getIdTask())
            ->findOne();

        if (!$taskEntity) {
            return null;
        }

        $taskMapper = $this->getFactory()->createTaskMapper();

        $taskEntity = $taskMapper->mapTaskTransferToTaskEntity(
            $taskTransfer,
            $taskEntity
        );

        $taskEntity->save();

        return $taskMapper->mapTaskEntityToTaskTransfer($taskEntity, new TaskTransfer());
    }
}
