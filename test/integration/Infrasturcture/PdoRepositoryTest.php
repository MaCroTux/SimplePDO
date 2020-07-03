<?php

namespace MaCroTux\Test\Integration\SimplePdo\Infrastructure\Connector;

use MaCroTux\SimplePdo\Domain\Parameters;
use MaCroTux\SimplePdo\Infrastructure\Connector;
use MaCroTux\SimplePdo\Infrastructure\Params\StringParameter;
use MaCroTux\SimplePdo\Infrastructure\PdoConnectionData;
use MaCroTux\SimplePdo\Infrastructure\PdoRepository;
use MaCroTux\Test\Integration\SimplePdo\IntegrationTestCase;

class PdoRepositoryTest extends IntegrationTestCase
{
    public function testShouldReturnQueryData(): void
    {
        $connector = Connector::build(
            new PdoConnectionData($this->host, $this->database, $this->user, $this->password)
        );

        $sut = new PdoRepository($connector);

        $query = $sut->byParams(
            'SELECT id, name FROM users WHERE name = :name',
            Parameters::fromArray(
                [
                    StringParameter::build('name', 'ouvameuh.net')
                ]
            )
        );

        $result = $query->shift();

        $this->assertSame('2', (string)$result->find('id'));
        $this->assertSame('ouvameuh.net', (string)$result->find('name'));
    }
}