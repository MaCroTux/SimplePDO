<?php

namespace MaCroTux\SimplePdo\Infrastructure;

use MaCroTux\SimplePdo\Domain\Parameters;
use MaCroTux\SimplePdo\Domain\Query;
use MaCroTux\SimplePdo\Domain\Repository;

class PdoRepository implements Repository
{
    private PdoConnector $connector;

    public function __construct(PdoConnector $connector)
    {
        $this->connector = $connector;
    }

    public function byParams(string $query, Parameters $params): Query
    {
        $connection = $this->connector->openConnection();

        $data = $connection->query($query, $params);

        if ($connection->isConnectionOpen()) {
            $connection->closeConnection();
        }

        return $data;
    }
}