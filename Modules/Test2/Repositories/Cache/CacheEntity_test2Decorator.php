<?php

namespace Modules\Test2\Repositories\Cache;

use Modules\Test2\Repositories\Entity_test2Repository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEntity_test2Decorator extends BaseCacheDecorator implements Entity_test2Repository
{
    public function __construct(Entity_test2Repository $entity_test2)
    {
        parent::__construct();
        $this->entityName = 'test2.entity_test2s';
        $this->repository = $entity_test2;
    }
}
