<?php

declare(strict_types=1);

namespace App\Work\Domain\Entities;

class Status
{
    private function __construct(private string $value)
    {
    }

    public function equals(Status $that): bool
    {
        return $that->value() === $this->value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function open(): Status
    {
        return new Status('open');
    }

    public static function blocked(): self
    {
        return new self('blocked');
    }

}
