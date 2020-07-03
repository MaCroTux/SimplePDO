<?php

namespace MaCroTux\SimplePdo\Domain;

interface Parameter
{
    public function filed(): string;

    public function value(): string;

    public function type(): int;
}