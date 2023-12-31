<?php

namespace Pyz\Zed\Tasks\Persistence;

use Pyz\Zed\Tasks\Persistence\Mapper\TaskMapper;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\Tasks\Persistence\TasksRepositoryInterface getRepository()
 * @method \Pyz\Zed\Tasks\Persistence\TasksEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Tasks\TasksConfig getConfig()
 */
class TasksPersistenceFactory extends AbstractPersistenceFactory
{
    public function createTaskMapper(): TaskMapper
    {
        return new TaskMapper();
    }
}
