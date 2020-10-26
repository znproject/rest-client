<?php

namespace common\fixtures\generators;

use common\enums\rbac\ApplicationPermissionEnum;
use common\enums\rbac\ApplicationRoleEnum;
use ZnBundle\Notify\Domain\Enums\NotifyPermissionEnum;
use ZnBundle\Rbac\Domain\Enums\RbacPermissionEnum;
use ZnBundle\User\Domain\Enums\UserPermissionEnum;
use ZnSandbox\Sandbox\YiiRbac\Base\BaseRbacFixture;
use ZnTool\RestClient\Domain\Enums\RestClientPermissionEnum;

class AuthItem extends BaseRbacFixture
{

    public function roleEnums()
    {
        return [
            ApplicationRoleEnum::class
        ];
    }

    public function permissionEnums()
    {
        return [
            UserPermissionEnum::class,
            RestClientPermissionEnum::class,
            RbacPermissionEnum::class,
            //ReferenceBookPermissionEnum::class,
            ApplicationPermissionEnum::class,
            NotifyPermissionEnum::class,
        ];
    }

    public function map()
    {
        return [
            ApplicationRoleEnum::UNKNOWN_USER => [
                ApplicationRoleEnum::GUEST,
            ],
            ApplicationRoleEnum::USER => [
                ApplicationRoleEnum::GUEST,
                ApplicationRoleEnum::UNKNOWN_USER,

                RestClientPermissionEnum::PROJECT_WRITE,
                RestClientPermissionEnum::PROJECT_READ,
            ],
            ApplicationRoleEnum::DEVELOPER => [
                ApplicationRoleEnum::GUEST,
                ApplicationRoleEnum::UNKNOWN_USER,
                ApplicationRoleEnum::USER,
                ApplicationRoleEnum::TESTER
            ],
            ApplicationRoleEnum::MODERATOR => [
                ApplicationRoleEnum::GUEST,
                ApplicationRoleEnum::UNKNOWN_USER,
                ApplicationRoleEnum::USER,

                //GeoPermissionEnum::CITY_MANAGE,
                UserPermissionEnum::IDENTITY_READ,
                UserPermissionEnum::IDENTITY_WRITE,
                RestClientPermissionEnum::ACCESS_MANAGE,
                ApplicationPermissionEnum::BACKEND_ALL
            ],
            ApplicationRoleEnum::ADMINISTRATOR => [
                ApplicationRoleEnum::GUEST,
                ApplicationRoleEnum::UNKNOWN_USER,
                ApplicationRoleEnum::USER,
                ApplicationRoleEnum::DEVELOPER,
                ApplicationRoleEnum::MODERATOR,
                RbacPermissionEnum::MANAGE,
            ],
            ApplicationRoleEnum::GUEST => [
                //ReferenceBookPermissionEnum::READ,
            ],
            ApplicationRoleEnum::TESTER => [
                NotifyPermissionEnum::TEST_READ,
            ],
        ];
    }
}
