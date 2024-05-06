<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

use App\DTO\RegistrationDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface InterfaceUserService
{
    public function create(RegistrationDTO $dto): User;

    public function getFreeMediaBuyer():Collection;

    public function setParent(User $user): void;
}
