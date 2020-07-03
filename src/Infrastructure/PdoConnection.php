<?php

namespace MaCroTux\SimplePdo\Infrastructure;

use MaCroTux\SimplePdo\Domain\Connection;
use MaCroTux\SimplePdo\Domain\Parameter;
use MaCroTux\SimplePdo\Domain\Parameters;
use MaCroTux\SimplePdo\Domain\Query;
use PDO;

class PdoConnection implements Connection
{
    private string $dns;
    private string $user;
    private string $password;
    /** @var array<string>  */
    private array $options;
    private PDO $connection;
    private bool $isOpenConnection = false;

    /**
     * PdoConnection constructor.
     * @param string $dns
     * @param string $user
     * @param string $password
     * @param array<string> $options
     */
    public function __construct(string $dns, string $user, string $password, array $options = [])
    {
        $this->dns = $dns;
        $this->user = $user;
        $this->password = $password;
        $this->options = $options;
    }

    public function openConnection(): self
    {
        if (true === $this->isOpenConnection && !empty($this->connection)) {
            return $this;
        }

        $this->isOpenConnection = true;
        $this->connection = new PDO($this->dns, $this->user, $this->password, $this->options);

        return $this;
    }

    public function closeConnection(): void
    {
        $this->isOpenConnection = false;
        unset($this->connection);
    }

    public function isConnectionOpen(): bool
    {
        return $this->isOpenConnection;
    }

    public function query(string $query, Parameters $params): Query
    {
        $pdoStatement = $this->connection->prepare($query);
        /** @var Parameter $param */
        foreach ($params->values() as $param) {
            $value = $param->value();

            $pdoStatement->bindParam(
                ':' . $param->filed(),
                $value,
                $param->type()
            );
        }
        $pdoStatement->execute();

        $fetch = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return false === $fetch
            ? Query::fromEmpty()
            : Query::fromArray($fetch)
        ;
    }
}
