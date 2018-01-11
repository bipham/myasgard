<?php

namespace Modules\Test2\Repositories\Cache;

use Modules\Test2\Repositories\Entity_test1Repository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEntity_test1Decorator extends BaseCacheDecorator implements Entity_test1Repository
{
    public function __construct(Entity_test1Repository $entity_test1)
    {
        parent::__construct();
        $this->entityName = 'test2.entity_test1s';
        $this->repository = $entity_test1;
    }
}
