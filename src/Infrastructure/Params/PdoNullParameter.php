<?php

namespace MaCroTux\SimplePdo\Infrastructure\Params;

use MaCroTux\SimplePdo\Domain\Parameter;

class PdoNullParameter implements Parameter
{
    private const PARAM_NULL = 0;

    private string $filed;
    private int $type;

    public function __construct(string $filed, int $type)
    {
        $this->filed = $filed;
        $this->type = $type;
    }

    public static function build(string $field): self
    {
        return new self($field, self::PARAM_NULL);
    }

    public function filed(): string
    {
        return $this->filed;
    }

    public function value(): string
    {
        return 'NULL';
    }

    public function type(): int
    {
        return $this->type;
    }
}