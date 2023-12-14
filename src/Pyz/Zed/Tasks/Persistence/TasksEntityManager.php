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
    public function saveTask(TaskTransfer $taskTransfer): TaskTransfer
    {
        $taskMapper = $this->getFactory()->createTaskMapper();

        $taskEntity = $taskMapper->mapTaskTransferToTaskEntity(
            $taskTransfer,
            new PyzTask()
        );

        $taskEntity->save();

        return $taskMapper->mapTaskEntityToTaskTransfer($taskEntity, new TaskTransfer());
    }
}
