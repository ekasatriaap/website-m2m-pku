<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends Component
{
    public $title;
    public $setting;
    /**
     * Create a new component instance.
     */
    public function __construct($title = null)
    {
        $this->title = $title ?? "Login";
        $this->setting = getSettingWebsite();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth-layout', ["title" => $this->title]);
    }
}
