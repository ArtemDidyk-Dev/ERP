<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegistrationRequest;
use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Services\Interfaces\InterfaceUserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     */
    protected string $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct(
        public RoleRepository $roleRepository,
        public InterfaceUserService $userService
    ) {
    }

    public function create(): View
    {
        $roles = $this->roleRepository->whereIn(ids: [Role::STATUS_TEAMLEADER_ID, Role::STATUS_BUYER_ID]);

        return view('pages.auth.register', compact('roles'));
    }

    public function store(AuthRegistrationRequest $request): RedirectResponse
    {
        $user = $this->userService->create(dto: $request->getDTO());
        Auth::login($user);
        $request->session()
            ->regenerate();
        $request->session()
            ->put([
                'role_id' => $user?->roles()
                    ->first()
                    ->id,
            ]);

        return redirect()->intended($this->redirectTo);
    }
}
