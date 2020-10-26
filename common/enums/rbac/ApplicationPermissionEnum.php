<?php

namespace common\enums\rbac;

use ZnCore\Base\Interfaces\GetLabelsInterface;

class ApplicationPermissionEnum implements GetLabelsInterface
{

    const BACKEND_ALL = 'oBackendAll';

    public static function getLabels()
    {
        return [
            self::BACKEND_ALL => 'Доступ в админ панель',
        ];
    }
}