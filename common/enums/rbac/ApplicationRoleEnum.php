<?php

namespace common\enums\rbac;

use ZnCore\Base\Interfaces\GetLabelsInterface;

class ApplicationRoleEnum implements GetLabelsInterface
{

    const ADMINISTRATOR = 'rAdministrator';
    const OPERATOR = 'rOperator';
    const USER = 'rUser';
    const GUEST = 'rGuest';
    const UNKNOWN_USER = 'rUnknownUser';
    const ROOT = 'rRoot';
    const MODERATOR = 'rModerator';
    const DEVELOPER = 'rDeveloper';
    const TESTER = 'rTester';

    public static function getLabels()
    {
        return [
            self::ADMINISTRATOR => 'Администратор системы',
            self::OPERATOR => 'Оператор поддержки',
            self::USER => 'Идентифицированный пользователь',
            self::GUEST => 'Гость системы',
            self::UNKNOWN_USER => 'Не идентифицированный пользователь',
            self::ROOT => 'Корневой администратор системы',
            self::MODERATOR => 'Модератор системы',
            self::DEVELOPER => 'Разработчик',
            self::TESTER => 'Тестировщик',
        ];
    }
}