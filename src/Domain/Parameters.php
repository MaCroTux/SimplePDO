<?php

namespace MaCroTux\SimplePdo\Domain;

class Parameters
{
    /** @var Parameter[] */
    private array $params;

    private function __construct(Parameter ...$params)
    {
        $this->params = $params;
    }

    /**
     * @param array<Parameter> $parameters
     * @return Parameters
     */
    public static function fromArray(array $parameters): self
    {
        return new self(...$parameters);
    }

    /**
     * @return Parameter[]
     */
    public function values(): array
    {
        return $this->params;
    }
}
