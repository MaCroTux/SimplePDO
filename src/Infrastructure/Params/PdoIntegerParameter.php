<?php

namespace MaCroTux\SimplePdo\Infrastructure\Params;

use MaCroTux\SimplePdo\Domain\Parameter;

class PdoIntegerParameter implements Parameter
{
    private const PARAM_INT = 1;

    private string $filed;
    private int $value;
    private int $type;

    public function __construct(string $filed, int $value, int $type)
    {
        $this->filed = $filed;
        $this->value = $value;
        $this->type = $type;
    }

    public static function build(string $field, int $value): self
    {
        return new self($field, $value, self::PARAM_INT);
    }

    public function filed(): string
    {
        return $this->filed;
    }

    public function value(): string
    {
        return (string)$this->value;
    }

    public function type(): int
    {
        return $this->type;
    }
}