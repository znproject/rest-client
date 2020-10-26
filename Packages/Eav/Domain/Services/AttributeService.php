<?php

namespace Packages\Eav\Domain\Services;

use Packages\Eav\Domain\Interfaces\Services\AttributeServiceInterface;
use Packages\Eav\Domain\Interfaces\Repositories\AttributeRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;

class AttributeService extends BaseCrudService implements AttributeServiceInterface
{

    public function __construct(AttributeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}

