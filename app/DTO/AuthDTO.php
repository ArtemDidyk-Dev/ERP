<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class AuthDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
