<?php

namespace MaCroTux\SimplePdo\Domain;

interface Repository
{
    public function byParams(string $query, Parameters $params): Query;
}
