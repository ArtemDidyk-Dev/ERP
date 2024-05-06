<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\AnalyticsDTO;
use App\Models\Analytics;
use App\Models\Role;
use App\Repositories\AnalyticsRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\InterfaceAnalyticsService;
use Illuminate\Database\Eloquent\Collection;

final class AnalyticsService implements InterfaceAnalyticsService
{
    public function __construct(
        public AnalyticsRepository $analyticsRepository,
        public UserRepository $userRepository
    ) {
    }

    public function store(AnalyticsDTO $dto): Analytics
    {
        $analytics = $this->analyticsRepository->create(data: [
            'offer' => $dto->offer,
            'geo' => $dto->geo,
            'income' => $dto->income,
            'expenses' => $dto->expenses,
            'source' => $dto->source,
            'vertical' => $dto->vertical,
            'roi' => $this->roi($dto->income, $dto->expenses),
            'user_id' => $dto->userId,
        ]);
        return $analytics;
    }

    public function update(AnalyticsDTO $dto, int $id): void
    {
        $analytics = $this->analyticsRepository->update(
            id: $id,
            data: [
                'offer' => $dto->offer,
                'geo' => $dto->geo,
                'income' => $dto->income,
                'expenses' => $dto->expenses,
                'source' => $dto->source,
                'vertical' => $dto->vertical,
                'roi' => $this->roi(income: $dto->income, expenses: $dto->expenses),
                'user_id' => $dto->userId,
            ]
        );
    }

    public function getUserStatistics(int $roleId, int $id): Collection
    {
        return match ($roleId) {
            Role::STATUS_ADMIN_ID => $this->userRepository->setRelations(relations: ['analytics', 'roles'])->whereHas(
                relation: 'analytics'
            ),
            Role::STATUS_TEAMLEADER_ID => $this->userRepository
                ->setRelations(relations: ['analytics', 'roles'])
                ->whereHas(relation: 'analytics')
                ->where('parent_id', $id),
            default => null,
        };
    }

    public function roi($income, $expenses): float
    {
        return (($income - $expenses) / $expenses) * 100;
    }
}
