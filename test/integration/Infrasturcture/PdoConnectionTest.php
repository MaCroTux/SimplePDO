<?php

namespace MaCroTux\Test\Integration\SimplePdo\Infrastructure\Connector;

use MaCroTux\SimplePdo\Infrastructure\PdoConnectionData;
use MaCroTux\SimplePdo\Infrastructure\PdoConnection;
use MaCroTux\Test\Integration\SimplePdo\IntegrationTestCase;

class ConnectionTest extends IntegrationTestCase
{
    public function testShouldConnect(): void
    {
        $connectionData = new PdoConnectionData($this->host, $this->database, $this->user, $this->password);

        $connection = new PdoConnection(
            $connectionData->dns(),
            $connectionData->user(),
            $connectionData->password()
        );

        $connection = $connection->openConnection();

        $this->assertTrue($connection->isConnectionOpen());

        $connection->closeConnection();

        $this->assertFalse($connection->isConnectionOpen());
    }
}