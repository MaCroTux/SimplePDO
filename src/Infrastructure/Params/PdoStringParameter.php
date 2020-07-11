<?php

namespace MaCroTux\SimplePdo\Infrastructure\Params;

use MaCroTux\SimplePdo\Domain\Parameter;

class PdoStringParameter implements Parameter
{
    private const PARAM_STR = 2;

    private string $filed;
    private string $value;
    private int $type;

    public function __construct(string $filed, string $value, int $type)
    {
        $this->filed = $filed;
        $this->value = $value;
        $this->type = $type;
    }

    public static function build(string $field, string $value): self
    {
        return new self($field, $value, self::PARAM_STR);
    }

    public function filed(): string
    {
        return $this->filed;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function type(): int
    {
        return $this->type;
    }
}