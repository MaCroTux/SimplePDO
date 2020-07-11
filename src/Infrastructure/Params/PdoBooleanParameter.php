<?php

namespace MaCroTux\SimplePdo\Infrastructure\Params;

use MaCroTux\SimplePdo\Domain\Parameter;

class PdoBooleanParameter implements Parameter
{
    private const PARAM_BOOLEAN = 5;

    private string $filed;
    private bool $value;
    private int $type;

    public function __construct(string $filed, bool $value, int $type)
    {
        $this->filed = $filed;
        $this->value = $value;
        $this->type = $type;
    }

    public static function build(string $field, bool $value): self
    {
        return new self($field, $value, self::PARAM_BOOLEAN);
    }

    public function filed(): string
    {
        return $this->filed;
    }

    public function value(): string
    {
        return $this->value === true ? '1' : '0';
    }

    public function type(): int
    {
        return $this->type;
    }
}