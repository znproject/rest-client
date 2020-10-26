<?php

namespace Packages\Eav\Domain\Services;

use Packages\Eav\Domain\Interfaces\Repositories\CategoryRepositoryInterface;
use Packages\Eav\Domain\Interfaces\Services\CategoryServiceInterface;
use ZnCore\Domain\Base\BaseCrudService;

class CategoryService extends BaseCrudService implements CategoryServiceInterface
{

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

}
