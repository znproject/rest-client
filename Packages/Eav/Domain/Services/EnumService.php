<?php

namespace Packages\Eav\Domain\Services;

use Packages\Eav\Domain\Interfaces\Services\EnumServiceInterface;
use Packages\Eav\Domain\Interfaces\Repositories\EnumRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;

class EnumService extends BaseCrudService implements EnumServiceInterface
{

    public function __construct(EnumRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}

