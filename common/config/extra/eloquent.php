<?php

return [
    //fos_user
    'connection' => [
        '__map' => [
            'fos_user' => 'user_identity',

            'eav_attribute' => 'eav.attribute',
            'eav_category' => 'eav.category',
            'eav_entity' => 'eav.entity',
            'eav_entity_attribute' => 'eav.entity_attribute',
            'eav_enum' => 'eav.enum',
            'eav_measure' => 'eav.measure',
            'eav_validation' => 'eav.validation',

            'auth_assignment' => 'user.auth_assignment',
            'auth_item' => 'user.auth_item',
            'auth_item_child' => 'user.auth_item_child',
            'auth_rule' => 'user.auth_rule',

            'user_confirm' => 'user.user_confirm',
            'user_credential' => 'user.user_credential',
            'user_identity' => 'user.user_identity',

            'messenger_bot' => 'messenger.bot',
            'messenger_chat' => 'messenger.chat',
            'messenger_flow' => 'messenger.flow',
            'messenger_member' => 'messenger.member',
            'messenger_message' => 'messenger.message',

            'restclient_access' => 'restclient.access',
            'restclient_authorization' => 'restclient.authorization',
            'restclient_bookmark' => 'restclient.bookmark',
            'restclient_environment' => 'restclient.environment',
            'restclient_project' => 'restclient.project',

            'reference_book' => 'reference.book',
            'reference_item' => 'reference.item',
            'reference_item_translation' => 'reference.item_translation',
        ],
    ],
    'fixture' => [
        'directory' => [
            'default' => '/common/fixtures/data',
        ],
    ],
    'migrate' => [
        'directory' => [
            '/vendor/zntool/rest-client/src/Domain/Migrations',
            '/vendor/znbundle/messenger/src/Domain/Migrations',
            '/vendor/znbundle/reference/src/Domain/Migrations',
            '/vendor/znbundle/user/src/Domain/Migrations',
            '/vendor/znbundle/language/src/Domain/Migrations',
            '/vendor/znbundle/rbac/src/Domain/Migrations',
            '/vendor/znbundle/queue/src/Domain/Migrations',
        ],
    ],
];
