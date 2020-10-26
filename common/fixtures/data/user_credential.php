<?php

return [
    'deps' => [
        'user_identity',
    ],
    'collection' => (new \common\fixtures\generators\UserCredential)->load(),
];
