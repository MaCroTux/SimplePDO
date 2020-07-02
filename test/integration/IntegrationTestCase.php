<?php

namespace MaCroTux\Test\Integration\SimplePdo;

use PHPUnit\Framework\TestCase;

class IntegrationTestCase extends TestCase
{
    protected string $host = 'mysql';
    protected string $database = 'accounts';
    protected string $user = 'root';
    protected string $password = 'root';
}