<?php

namespace MaCroTux\Test\Integration\SimplePdo\Infrastructure\Connector;

use MaCroTux\SimplePdo\Infrastructure\PdoConnectionData;
use MaCroTux\SimplePdo\Infrastructure\Connector;
use MaCroTux\Test\Integration\SimplePdo\IntegrationTestCase;

class ConnectorTest extends IntegrationTestCase
{
    public function testShouldConnect(): void
    {
        $connector = Connector::build(
            new PdoConnectionData($this->host, $this->database, $this->user, $this->password)
        );

        $connection = $connector->openConnection();

        $this->assertNotEmpty($connection);
    }
}