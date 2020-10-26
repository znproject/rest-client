<?php

namespace Tests\Api;

use ZnCore\Base\Enums\Http\HttpStatusCodeEnum;
use ZnTool\Test\Base\BaseRestApiTest;

class RegistrationTest extends BaseRestApiTest
{

    protected $basePath = 'v1';

    protected function fixtures(): array
    {
        return [
            //'auth_assignment',
            'user_credential',
            'user_confirm',
            'queue_job',
        ];
    }

    public function testRequestActivationCode()
    {
        $body = [
            'phone' => '77771112233',
        ];
        $response = $this->getRestClient()->sendPost('registration/request-activation-code', $body);
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::CREATED);
    }

    public function testRequestActivationCodeRepeat()
    {
        $this->testRequestActivationCode();

        $body = [
            'phone' => '77771112233',
        ];
        $response = $this->getRestClient()->sendPost('registration/request-activation-code', $body);
        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::ACCEPTED);
    }

    public function testVerifyActivationCodeBad()
    {
        $this->testRequestActivationCode();

        $body = [
            'phone' => '77771112233',
            'activation_code' => '654321',
        ];
        $response = $this->getRestClient()->sendPost('registration/verify-activation-code', $body);

        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::UNPROCESSABLE_ENTITY)
            ->assertUnprocessableEntity(['activation_code']);
    }

    public function testVerifyActivationCodeBadPhone()
    {
        $body = [
            'phone' => '77771112244',
            'activation_code' => '654321',
        ];
        $response = $this->getRestClient()->sendPost('registration/verify-activation-code', $body);

        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::UNPROCESSABLE_ENTITY)
            ->assertUnprocessableEntity(['phone']);
    }

    public function testVerifyActivationCode()
    {
        $this->testRequestActivationCode();

        $body = [
            'phone' => '77771112233',
            'activation_code' => $this->getLastActivationCode(),
        ];
        $response = $this->getRestClient()->sendPost('registration/verify-activation-code', $body);

        $this->getRestAssert($response)
            ->assertStatusCode(HttpStatusCodeEnum::NO_CONTENT);
    }

    private function getLastActivationCode()
    {
        $client = $this->getRestClient();
        $client->getAuthAgent()->authByLogin('admin');
        $response = $client->sendGet('notify-test');
        $body = $this->getRestAssert($response)->getBody();
        $this->assertGreaterThanOrEqual(1, count($body));
        $message = $body[0]['message'];
        preg_match('/([\d]{6})/i', $message, $matches);
        return $matches[0];
    }

}
