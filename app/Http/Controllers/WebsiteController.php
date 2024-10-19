<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SettingBerandaWeb;
use App\Models\Slider;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    protected $view = "website";
    public function index()
    {
        $sliders = Slider::all();
        $setting = SettingBerandaWeb::get()->keyBy('param');
        $alumnis = Testimoni::all();
        $news = News::with(['bidang'])->statusPublished()->get();
        $data = [
            "title" => "Beranda",
            "sliders" => $sliders,
            "setting" => $setting,
            "alumnis" => $alumnis,
            "news" => $news
        ];

        return view("{$this->view}.beranda", $data);
    }
}
