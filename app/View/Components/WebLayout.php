<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WebLayout extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $setting;
    public $menu;

    public function __construct()
    {
        $this->title = $title ?? "Dashboard";
        $this->setting = getSettingWebsite();
        $this->menu = Menu::with("children")
            ->whereNull("parent_id")
            ->orderBy("urutan")
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.web-layout');
    }
}
