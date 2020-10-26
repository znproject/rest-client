<?php

namespace Packages\Eav\Domain\Services;

use Packages\Eav\Domain\Interfaces\Services\MeasureServiceInterface;
use Packages\Eav\Domain\Interfaces\Repositories\MeasureRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;

class MeasureService extends BaseCrudService implements MeasureServiceInterface
{

    public function __construct(MeasureRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

}
