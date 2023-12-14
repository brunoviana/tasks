<?php

namespace PyzTest\Zed\Tasks\Business;

use Codeception\Test\Unit;
use PyzTest\Zed\Tasks\TasksBusinessTester;
use Spryker\Shared\Kernel\Transfer\Exception\RequiredTransferPropertyException;

class TasksFacadeTest extends Unit
{

    protected TasksBusinessTester $tester;

    public function testCreateTaskIsExecutedSuccessfully(): void
    {
        // Arrange
        $taskTransfer = $this->tester->getTaskTransfer();

        // Act
        $createTaskResponse = $this->tester->getFacade()->createTask($taskTransfer);

        // Assert
        $this->tester->assertCreateTaskCreatedTaskSuccessfully($createTaskResponse);
    }

    public function testCreateTaskMustValidateIfTitleIsMissing(): void
    {
        // Assert
        $this->expectException(RequiredTransferPropertyException::class);

        // Arrange
        $taskTransfer = $this->tester->getTaskTransfer([
            'title' => null,
        ]);

        // Act
        $this->tester->getFacade()->createTask($taskTransfer);
    }

    public function testCreateTaskMustValidateIfStatusIsMissing(): void
    {
        // Assert
        $this->expectException(RequiredTransferPropertyException::class);

        // Arrange
        $taskTransfer = $this->tester->getTaskTransfer([
            'status' => null,
        ]);

        // Act
        $this->tester->getFacade()->createTask($taskTransfer);
    }

    public function testCreateTaskMustValidateIfStatusIsValid(): void
    {
        // Arrange
        $taskTransfer = $this->tester->getTaskTransfer();

        $this->tester->mockEntityManagerSaveTaskWithException();

        // Act
        $createTaskResponse = $this->tester->getFacade()->createTask($taskTransfer);

        // Assert
        $this->tester->assertCreateTaskHandledExceptionSuccessfully($createTaskResponse);
    }

}
