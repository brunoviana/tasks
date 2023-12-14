<?php

namespace Pyz\Zed\Tasks\Business;

use Generated\Shared\Transfer\TaskResponseTransfer;
use Generated\Shared\Transfer\TaskTransfer;
use Pyz\Zed\Tasks\Business\TasksFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Tasks\Business\TasksBusinessFactory getFactory()
 * @method \Pyz\Zed\Tasks\Persistence\TasksRepositoryInterface getRepository()
 * @method \Pyz\Zed\Tasks\Persistence\TasksEntityManagerInterface getEntityManager()
 */
class TasksFacade extends AbstractFacade implements TasksFacadeInterface
{

    public function createTask(TaskTransfer $taskTransfer): TaskResponseTransfer
    {
        return $this->getFactory()->createTaskWriter()->createTask($taskTransfer);
    }
}
