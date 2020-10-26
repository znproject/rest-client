<?php

namespace common\fixtures\generators;

use ZnLib\Fixture\Domain\Libs\FixtureGenerator;
use ZnLib\Fixture\Domain\Libs\DataWithCollectionFixture;

class UserIdentity extends DataWithCollectionFixture
{

    public $time = '2018-03-28 21:00:13';

    public function deps()
    {
        return [

        ];
    }

    public function count(): int
    {
        return 10;
    }

    public function collection(): array
    {
        return [
            [
                'id' => 1,
                'login' => 'admin',
                'status' => 1,
                'created_at' => $this->time,
                'updated_at' => $this->time,
            ],
            [
                'id' => 2,
                'login' => 'moderator',
                'status' => 1,
                'created_at' => $this->time,
                'updated_at' => $this->time,
            ],
            [
                'id' => 3,
                'login' => 'developer',
                'status' => 1,
                'created_at' => $this->time,
                'updated_at' => $this->time,
            ],
            [
                'id' => 4,
                'login' => 'bot',
                'status' => 1,
                'created_at' => $this->time,
                'updated_at' => $this->time,
            ],

        ];
    }

    public function callback($index, FixtureGenerator $fixtureFactory): array
    {
        $username = 'user' . $index;
        return [
            'id' => $index,
            'login' => $username,
            'status' => 1,
            'created_at' => $this->time,
            'updated_at' => $this->time,
        ];
    }
}