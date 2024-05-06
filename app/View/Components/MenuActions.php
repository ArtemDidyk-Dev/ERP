<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Role;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuActions extends Component
{
    public bool $addUsers;

    public function __construct()
    {
        $this->addUsers = session('role_id') === Role::STATUS_TEAMLEADER_ID;
    }

    public function render(): View|Closure|string
    {
        return view('components.menu-actions');
    }
}
