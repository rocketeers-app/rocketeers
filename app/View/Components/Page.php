<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Page extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title,
        public ?string $description,
        public ?string $keywords,
    ) {
        if (blank($this->title)) {
            $this->title = config('app.name');
        } elseif (! str_ends_with($this->title, ' - '.config('app.name'))) {
            $this->title .= ' - '.config('app.name');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page');
    }
}
