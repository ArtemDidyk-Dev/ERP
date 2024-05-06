<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class AnalyticsDTO
{
    public function __construct(
        public string $offer,
        public string $geo,
        public string $vertical,
        public float $expenses,
        public float $income,
        public string $source,
        public int $userId,
    ) {
    }
}
