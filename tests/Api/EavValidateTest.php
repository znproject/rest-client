<?php

namespace Tests\Api;

use ZnCore\Base\Enums\Http\HttpStatusCodeEnum;
use ZnTool\Test\Base\BaseRestApiTest;

class EavValidateTest extends BaseRestApiTest
{

    protected $basePath = 'v1';

    protected function fixtures(): array
    {
        return [
            'eav_category',
            'eav_entity',
            'eav_entity_attribute',
            'eav_enum',
            'eav_attribute',
            'eav_validation',
            'eav_measure',
            'user_credential',
            'auth_assignment',
        ];
    }

    /*public function testValidateEntity()
    {
        $body = [
            'season' => 'summer',
            'volume' => '6',
        ];
        $response = $this->getRestClient()->sendPost('eav-validate/1', $body);
        //$this->printContent($response);
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::NO_CONTENT);
    }*/

    /*public function testRequestActivationCode()
    {
        $body = [
            'season' => 'qwer',
        ];
        $response = $this->getRestClient()->sendPost('eav-validate/1', $body);
        //$this->printContent($response);
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::UNPROCESSABLE_ENTITY)
            ->assertUnprocessableEntity(['volume']);
    }*/

}
