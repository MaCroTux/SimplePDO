<?php

namespace MaCroTux\Test\Integration\SimplePdo\Infrastructure;

use MaCroTux\SimplePdo\Infrastructure\PdoConnectionData;
use MaCroTux\SimplePdo\Infrastructure\PdoConnector;
use MaCroTux\Test\Integration\SimplePdo\IntegrationTestCase;

class ConnectorTest extends IntegrationTestCase
{
    public function testShouldConnect(): void
    {
        $connector = PdoConnector::build(
            new PdoConnectionData($this->host, $this->database, $this->user, $this->password)
        );

        $connection = $connector->openConnection();

        $this->assertNotEmpty($connection);
    }
}