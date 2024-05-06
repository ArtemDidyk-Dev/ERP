<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

final class UserRepository extends BaseRepository
{
    public function getModelClassName(): string
    {
        return User::class;
    }
}
