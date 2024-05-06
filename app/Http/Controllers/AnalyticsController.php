<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AnalyticsRequest;
use App\Repositories\AnalyticsRepository;
use App\Services\Interfaces\InterfaceAnalyticsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    public function __construct(
        public InterfaceAnalyticsService $analyticsService,
        public AnalyticsRepository $analyticsRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        $role = $user->roles->first()
            ->name;
        $statistics = $user?->analytics;
        $userStatistics = $this->analyticsService->getUserStatistics(roleId: $user->roles->first()->id, id: Auth::id());

        return view('pages.analytics.index', compact('user', 'role', 'statistics', 'userStatistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.analytics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnalyticsRequest $request): RedirectResponse
    {
        $this->analyticsService->store(dto: $request->getDTO());

        return redirect()->route('analytics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $analytics = $this->analyticsRepository->findById(id: $id);

        return view('pages.analytics.edit', compact('analytics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnalyticsRequest $request, int $id)
    {
        $this->analyticsService->update(dto: $request->getDTO(), id: $id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->analyticsRepository->delete(id: $id);

        return redirect()->back();
    }
}
