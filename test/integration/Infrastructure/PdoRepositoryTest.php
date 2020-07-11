<?php

namespace MaCroTux\Test\Integration\SimplePdo\Infrastructure;

use DateTime;
use MaCroTux\SimplePdo\Domain\Parameters;
use MaCroTux\SimplePdo\Infrastructure\Params\PdoDataTimeParameter;
use MaCroTux\SimplePdo\Infrastructure\Params\PdoNullParameter;
use MaCroTux\SimplePdo\Infrastructure\PdoConnector;
use MaCroTux\SimplePdo\Infrastructure\Params\PdoBooleanParameter;
use MaCroTux\SimplePdo\Infrastructure\Params\PdoIntegerParameter;
use MaCroTux\SimplePdo\Infrastructure\Params\PdoStringParameter;
use MaCroTux\SimplePdo\Infrastructure\PdoConnectionData;
use MaCroTux\SimplePdo\Infrastructure\PdoRepository;
use MaCroTux\Test\Integration\SimplePdo\IntegrationTestCase;

class PdoRepositoryTest extends IntegrationTestCase
{
    /**
     * @param string $sql
     * @param Parameters $parameters
     * @dataProvider parametersProvider
     */
    public function testShouldReturnQueryData(string $sql, Parameters $parameters): void
    {
        $connector = PdoConnector::build(
            new PdoConnectionData($this->host, $this->database, $this->user, $this->password)
        );

        $sut = new PdoRepository($connector);

        $query = $sut->byParams($sql, $parameters);

        $result = $query->shift();

        $this->assertSame('2', (string)$result->find('id'));
        $this->assertSame('ouvameuh.net', (string)$result->find('name'));
    }

    /**
     * @return array|array[]
     */
    public function parametersProvider(): array
    {
        return [
            'StringValue' => [
                'SELECT id, name FROM users WHERE name = :name',
                Parameters::fromArray(
                    [
                        PdoStringParameter::build('name', 'ouvameuh.net')
                    ]
                )
            ],
            'IntegerValue' => [
                'SELECT id, name FROM users WHERE id = :id',
                Parameters::fromArray(
                    [
                        PdoIntegerParameter::build('id', 2)
                    ]
                )
            ],
            'BooleanValue' => [
                'SELECT id, name FROM users WHERE signed = :signed',
                Parameters::fromArray(
                    [
                        PdoBooleanParameter::build('signed', false)
                    ]
                )
            ],
            'DateTimeValue' => [
                'SELECT id, name FROM users WHERE createdAt = :createdAt',
                Parameters::fromArray(
                    [
                        PdoDataTimeParameter::build('createdAt', new DateTime('2020-06-28 10:00:05'))
                    ]
                )
            ],
            'NullValue' => [
                'SELECT id, name FROM users WHERE account is :account',
                Parameters::fromArray(
                    [
                        PdoNullParameter::build('account')
                    ]
                )
            ],
        ];
    }
}