<?php

namespace Packages\Eav\Domain\Services;

use Packages\Eav\Domain\Interfaces\Services\EntityAttributeServiceInterface;
use Packages\Eav\Domain\Interfaces\Repositories\EntityAttributeRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;

class EntityAttributeService extends BaseCrudService implements EntityAttributeServiceInterface
{

    public function __construct(EntityAttributeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}

