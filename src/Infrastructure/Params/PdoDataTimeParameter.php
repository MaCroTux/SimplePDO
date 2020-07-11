<?php

namespace MaCroTux\SimplePdo\Infrastructure\Params;

use DateTime;
use MaCroTux\SimplePdo\Domain\Parameter;

class PdoDataTimeParameter implements Parameter
{
    private const PARAM_DATE = 2;
    private const TIME_FORMAT = 'Y-m-d H:i:s';

    private string $filed;
    private DateTime $value;
    private int $type;

    public function __construct(string $filed, DateTime $value, int $type)
    {
        $this->filed = $filed;
        $this->value = $value;
        $this->type = $type;
    }

    public static function build(string $field, DateTime $value): self
    {
        return new self($field, $value, self::PARAM_DATE);
    }

    public function filed(): string
    {
        return $this->filed;
    }

    public function value(): string
    {
        return $this->value->format(self::TIME_FORMAT);
    }

    public function type(): int
    {
        return $this->type;
    }
}