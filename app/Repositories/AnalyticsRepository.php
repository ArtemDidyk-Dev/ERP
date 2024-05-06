<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Analytics;

final class AnalyticsRepository extends BaseRepository
{
    public function getModelClassName(): string
    {
        return Analytics::class;
    }
}
