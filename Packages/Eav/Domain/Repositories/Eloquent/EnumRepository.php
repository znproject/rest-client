<?php

namespace Packages\Eav\Domain\Repositories\Eloquent;

use Packages\Eav\Domain\Entities\EnumEntity;
use Packages\Eav\Domain\Interfaces\Repositories\EnumRepositoryInterface;
use ZnLib\Db\Base\BaseEloquentCrudRepository;
use ZnCore\Domain\Libs\Query;

class EnumRepository extends BaseEloquentCrudRepository implements EnumRepositoryInterface
{

    public function tableName(): string
    {
        return 'eav_enum';
    }

    public function getEntityClass(): string
    {
        return EnumEntity::class;
    }

    protected function forgeQuery(Query $query = null)
    {
        return parent::forgeQuery($query)->orderBy(['sort' => SORT_ASC]);
    }
}

