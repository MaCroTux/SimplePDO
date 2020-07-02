<?php

namespace MaCroTux\SimplePdo\Infrastructure;

use MaCroTux\SimplePdo\Domain\ConnectionData;

class PdoConnectionData implements ConnectionData
{
    private const DNS = 'mysql:host=%s;dbname=%s;port=%s';

    private string $host;
    private string $database;
    private int $port;
    private string $user;
    private string $password;

    public function __construct(string $host, string $database, string $user, string $password, int $port = 3306)
    {
        $this->host = $host;
        $this->database = $database;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
    }

    public function dns(): string
    {
        return sprintf(self::DNS, $this->host, $this->database, $this->port);
    }

    public function user(): string
    {
        return $this->user;
    }

    public function password(): string
    {
        return $this->password;
    }
}