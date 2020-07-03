<?php

namespace MaCroTux\SimplePdo\Domain;

use ArrayAccess;

class Query implements ArrayAccess
{
    /** @var QueryResult[] */
    private array $result;

    private function __construct(QueryResult ...$result)
    {
        $this->result = $result;
    }

    /**
     * @param array<QueryResult> $result
     * @return static
     */
    public static function fromArray(array $result): self
    {
        $result = array_map(
            function($row) {
                $cols = [];
                foreach ($row as $field => $col) {
                    $cols[] = new Result($field, $col);
                }

                return QueryResult::fromArray($cols);
            },
            $result
        );

        return new self(...$result);
    }

    public static function fromEmpty(): self
    {
        return new self(...[]);
    }

    public function shift(): QueryResult
    {
        return array_shift($this->result);
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->result);
    }

    public function offsetGet($offset): QueryResult
    {
        return $this->result[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->result[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->result[$offset]);
    }
}