<?php

namespace MaCroTux\SimplePdo\Infrastructure;

use MaCroTux\SimplePdo\Domain\Connection;
use MaCroTux\SimplePdo\Domain\ConnectionData;

class Connector
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public static function build(ConnectionData $connectionData): self
    {
        $connection = new PdoConnection(
            $connectionData->dns(),
            $connectionData->user(),
            $connectionData->password()
        );

        return new self($connection);
    }

    public function openConnection(): Connection
    {
        return $this->connection->openConnection();
    }

    public function __destruct()
    {
        $this->connection->closeConnection();
    }
}