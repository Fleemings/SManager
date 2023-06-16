<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class Header extends Component
{
    public $breadcrumbs;
    public $pageTitle;

    public function __construct($breadcrumbs, $pageTitle)
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
