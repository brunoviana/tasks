<?php

declare(strict_types=1);

namespace PyzTest\Zed\Tasks;

use Codeception\Stub;
use Exception;
use Generated\Shared\DataBuilder\TaskBuilder;
use Generated\Shared\Transfer\TaskResponseTransfer;
use Generated\Shared\Transfer\TaskTransfer;
use Pyz\Zed\Tasks\Persistence\TasksEntityManagerInterface;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class TasksBusinessTester extends \Codeception\Actor
{
    use _generated\TasksBusinessTesterActions;

    public function getTaskTransfer(array $seedData = []): TaskTransfer
    {
        return (new TaskBuilder($seedData))->build();
    }

    public function mockEntityManagerSaveTaskWithException(): void
    {
        $taxAppEntityManagerMock = Stub::makeEmpty(TasksEntityManagerInterface::class, [
            'saveTask' => function (): void {
                throw new Exception('something went wrong');
            },
        ]);

        $this->mockFactoryMethod('getEntityManager', $taxAppEntityManagerMock);
    }
}
