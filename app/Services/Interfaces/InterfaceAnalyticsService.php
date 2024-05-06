<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

use App\DTO\AnalyticsDTO;
use App\Models\Analytics;
use Illuminate\Database\Eloquent\Collection;

interface InterfaceAnalyticsService
{
    public function store(AnalyticsDTO $dto): Analytics;

    public function update(AnalyticsDTO $dto, int $id): void;

    public function getUserStatistics(int $roleId, int $id): Collection;

    public function roi($income, $expenses): float;

}
