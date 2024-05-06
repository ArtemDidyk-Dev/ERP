<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Interfaces\InterfaceUserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        public UserRepository $userRepository,
        public InterfaceUserService $userService,
    ) {
    }

    public function index(): View
    {
        $users = $this->userService->getFreeMediaBuyer();
        return view('pages.employee.index', compact('users'));
    }

    public function store(User $user): RedirectResponse
    {
        $this->userService->setParent(user: $user);
        return redirect()->back();
    }
}
