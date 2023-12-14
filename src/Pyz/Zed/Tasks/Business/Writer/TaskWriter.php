<?php

namespace Pyz\Zed\Tasks\Business\Writer;

use Generated\Shared\Transfer\TaskErrorTransfer;
use Generated\Shared\Transfer\TaskResponseTransfer;
use Generated\Shared\Transfer\TaskTransfer;
use Pyz\Zed\Tasks\Persistence\TasksEntityManagerInterface;

class TaskWriter implements TaskWriterInterface
{
    public function __construct(
        protected TasksEntityManagerInterface $entityManager,
    ) {}

    public function createTask(TaskTransfer $taskTransfer): TaskResponseTransfer
    {
        $taskTransfer->requireTitle()->requireStatus();

        try{
            $taskTransfer = $this->entityManager->saveTask($taskTransfer);

            return (new TaskResponseTransfer())->setTaskTransfer($taskTransfer)
                ->setIsSuccessful(true);
        } catch (\Exception $exception) {
            // @TODO log exception
            return (new TaskResponseTransfer())->setIsSuccessful(false)
                                                ->addError(
                                                    (new TaskErrorTransfer())->setMessage(
                                                        'An error occurred while saving the task'
                                                    )
                                                );
        }

    }
}
