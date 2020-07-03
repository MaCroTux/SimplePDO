<?php

namespace MaCroTux\SimplePdo\Domain;

class QueryResult
{
    /** @var Result[] */
    private array $result;

    private function __construct(Result ...$result)
    {
        $this->result = $result;
    }

    /**
     * @param array<Result> $result
     * @return QueryResult
     */
    public static function fromArray(array $result): self
    {
        return new self(...$result);
    }

    public function find(string $field): ?Result
    {
        foreach ($this->result as $result) {
            if ($result->field() === $field) {
                return $result;
            }
        }
        return null;
    }
}
