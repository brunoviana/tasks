<?php

namespace Pyz\Zed\Tasks\Business;

use Pyz\Zed\Tasks\Business\Writer\TaskWriter;
use Pyz\Zed\Tasks\Business\Writer\TaskWriterInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Tasks\Persistence\TasksEntityManagerInterface getEntityManager()()
 * @method \Pyz\Zed\Tasks\Persistence\TasksRepositoryInterface getRepository()
 * @method \Pyz\Zed\Tasks\Business\TasksConfig getConfig()
 */
class TasksBusinessFactory extends AbstractBusinessFactory
{
    public function createTaskWriter(): TaskWriterInterface
    {
        return new TaskWriter(
            $this->getEntityManager(),
        );
    }
}
