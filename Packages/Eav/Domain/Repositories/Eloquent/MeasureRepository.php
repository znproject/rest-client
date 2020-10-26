<?php

namespace Packages\Eav\Domain\Repositories\Eloquent;

use Packages\Eav\Domain\Entities\MeasureEntity;
use Packages\Eav\Domain\Interfaces\Repositories\MeasureRepositoryInterface;
use ZnLib\Db\Base\BaseEloquentCrudRepository;

class MeasureRepository extends BaseEloquentCrudRepository implements MeasureRepositoryInterface
{

    public function tableName(): string
    {
        return 'eav_measure';
    }

    public function getEntityClass(): string
    {
        return MeasureEntity::class;
    }

}
