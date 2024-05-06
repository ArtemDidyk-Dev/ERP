<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Role;

final class RoleRepository extends BaseRepository
{
    public function getModelClassName(): string
    {
        return Role::class;
    }
}
