<?php

namespace Packages\Eav\Domain\Services;

use Packages\Eav\Domain\Interfaces\Services\ValidationServiceInterface;
use Packages\Eav\Domain\Interfaces\Repositories\ValidationRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;

class ValidationService extends BaseCrudService implements ValidationServiceInterface
{

    public function __construct(ValidationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}

