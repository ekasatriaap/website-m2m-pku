<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $title;
    public $setting;

    public function __construct($title = null)
    {
        $this->title = $title ?? "Dashboard";
        $this->setting = getSettingWebsite();
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app-layout', ['title' => $this->title]);
    }
}
