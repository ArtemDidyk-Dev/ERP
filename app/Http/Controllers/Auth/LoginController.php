<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    public function show(): View
    {
        return view('pages.auth.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }

    public function authenticate(AuthRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->getDTO()->toArray())) {
            $request->session()
                ->regenerate();
            $request->session()
                ->put([
                    'role_id' => Auth::user()?->roles()->first()->id,
                ]);
            return redirect()->intended($this->redirectTo);
        }
        return redirect(route('login'))
            ->withErrors([
                'loginError' => 'Authorization failed',
            ]);
    }
}
