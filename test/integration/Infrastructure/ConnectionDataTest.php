<?php


namespace MaCroTux\Test\Integration\SimplePdo\Infrastructure;

use MaCroTux\SimplePdo\Infrastructure\PdoConnectionData;
use MaCroTux\Test\Integration\SimplePdo\IntegrationTestCase;

class ConnectionDataTest extends IntegrationTestCase
{
    private PdoConnectionData $sut;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sut = new PdoConnectionData($this->host, $this->database, $this->user, $this->password);
    }

    public function testShouldReturnDnsString(): void
    {
        $dns = $this->sut->dns();

        $this->assertSame(
            'mysql:host=mysql;dbname=accounts;port=3306',
            $dns
        );
    }

    public function testShouldReturnUsername(): void
    {
        $user = $this->sut->user();

        $this->assertSame(
            'root',
            $user
        );
    }

    public function testShouldReturnPassword(): void
    {
        $password = $this->sut->password();

        $this->assertSame(
            'root',
            $password
        );
    }
}