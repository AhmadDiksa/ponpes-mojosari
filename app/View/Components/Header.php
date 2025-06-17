<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Header as HeaderModel;

class Header extends Component
{
    public $header;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->header = HeaderModel::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header', [
            'header' => $this->header
        ]);
    }
}
