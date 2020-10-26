<?php

namespace common\fixtures\generators;

use ZnLib\Fixture\Domain\Libs\FixtureGenerator;
use ZnLib\Fixture\Domain\Libs\DataWithCollectionFixture;

class UserCredential extends DataWithCollectionFixture
{

    private $validation = '$2y$10$VeTx5VTpb4AGoLRO6FfVxuNM5Xqbf7SgbC1LMvuMAi28RB9v3lPj.';

    public function deps()
    {
        return [
            'user_identity',
        ];
    }

    public function count(): int
    {
        return 10;
    }

    public function collection(): array {
        return [
            [
                'id' => 1,
                'identity_id' => 1,
                'type' => 'login',
                'credential' => 'admin',
                'validation' => $this->validation,
            ],
            [
                'id' => 2,
                'identity_id' => 2,
                'type' => 'login',
                'credential' => 'moderator',
                'validation' => $this->validation,
            ],
            [
                'id' => 3,
                'identity_id' => 3,
                'type' => 'login',
                'credential' => 'developer',
                'validation' => $this->validation,
            ],
            [
                'id' => 4,
                'identity_id' => 4,
                'type' => 'login',
                'credential' => 'bot',
                'validation' => $this->validation,
            ],

        ];
    }

    public function callback($index, FixtureGenerator $fixtureFactory): array {
        $username = 'user' . $index;
        return [
            'id' => $index,
            'identity_id' => $index,
            'type' => 'login',
            'credential' => $username,
            'validation' => $this->validation,
        ];
    }
}