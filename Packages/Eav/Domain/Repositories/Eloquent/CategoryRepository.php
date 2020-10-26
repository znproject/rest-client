<?php

namespace Packages\Eav\Domain\Repositories\Eloquent;

use Packages\Eav\Domain\Entities\CategoryEntity;
use Packages\Eav\Domain\Interfaces\Repositories\CategoryRepositoryInterface;
use ZnLib\Db\Base\BaseEloquentCrudRepository;

class CategoryRepository extends BaseEloquentCrudRepository implements CategoryRepositoryInterface
{

    public function tableName(): string
    {
        return 'eav_category';
    }

    public function getEntityClass(): string
    {
        return CategoryEntity::class;
    }

}
