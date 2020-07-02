<?php

namespace MaCroTux\SimplePdo\Domain;

interface ConnectionData
{
    public function dns(): string;

    public function user(): string;

    public function password(): string;
}