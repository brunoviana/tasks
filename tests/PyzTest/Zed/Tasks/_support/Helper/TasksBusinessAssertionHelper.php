<?php

namespace PyzTest\Zed\Tasks\Helper;

use Codeception\Module;
use Generated\Shared\Transfer\TaskResponseTransfer;
use Generated\Shared\Transfer\TaskTransfer;

class TasksBusinessAssertionHelper extends Module
{

    public function assertCreateTaskCreatedTaskSuccessfully(
        TaskResponseTransfer $taskResponseTransfer,
    ): void {
        $this->assertNotNull(
            $taskResponseTransfer->getTaskTransfer()->getIdTask(),
            'Task id cannot be null',
        );

        $this->assertTrue(
            $taskResponseTransfer->getIsSuccessful(),
            'Response must return successful flag as true',
        );
    }

    public function assertCreateTaskHandledExceptionSuccessfully(
        TaskResponseTransfer $taskResponseTransfer,
    ): void {
        $this->assertNull(
            $taskResponseTransfer->getTaskTransfer(),
            'Task response must return no task transfer',
        );

        $this->assertFalse(
            $taskResponseTransfer->getIsSuccessful(),
            'Response must return successful flag as false',
        );

        $this->assertEquals(
            $taskResponseTransfer->getErrors()[0]->getMessage(),
            'An error occurred while saving the task',
        );
    }
}
