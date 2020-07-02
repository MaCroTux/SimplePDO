<?php

namespace MaCroTux\SimplePdo\Domain;

interface Connection
{
    public function openConnection(): Connection;

    public function closeConnection(): void;

    public function isConnectionOpen(): bool;
}