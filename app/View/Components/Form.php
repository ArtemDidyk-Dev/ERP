<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string|null $offer,
        public string|null $geo,
        public string|null $vertical,
        public string|null $expenses,
        public string|null $income,
        public string|null $source,
        public string $route,
        public string $buttonText,
        public string $method
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
