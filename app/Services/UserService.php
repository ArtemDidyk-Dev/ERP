<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\RegistrationDTO;
use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\InterfaceUserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class UserService implements InterfaceUserService
{
    public function __construct(
        public RoleRepository $roleRepository,
        public UserRepository $userRepository
    ) {
    }

    public function create(RegistrationDTO $dto): User
    {
        $role = $this->roleRepository->findById(id: $dto->roleId);
        $user = $this->userRepository->create(data: [
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
        ]);
        $user->roles()
            ->attach($role);

        return $user;
    }

    public function getFreeMediaBuyer():Collection
    {
        return $this->userRepository->whereHas(relation: 'roles', callbacks: function ($query) {
            $query->where([
                'roles.id' => Role::STATUS_BUYER_ID,
                'parent_id' => null,
            ]);
        });
    }

    public function setParent(User $user): void
    {
        $this->userRepository->update(id: $user->id, data: [
            'parent_id' => Auth::id(),
        ]);
    }
}
