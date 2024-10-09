<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\News;
use App\Models\Pages;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "all_news" => News::getNews()->count(),
            "draft_news" => News::getNews()->statusDraft()->count(),
            "published_news" => News::getNews()->statusPublished()->count(),
            "submission_news" => News::getNews()->statusSubmission()->count(),
            "reject_news" => News::getNews()->statusReject()->count(),
            "news_per_bidang" => Bidang::with('news')->get(),
            "pages" => Pages::all()->count(),
            "color" => [
                0 => "primary",
                1 => "success",
                2 => "info",
                3 => "secondary",
                4 => "danger",
            ]
        ];
        return view('cms.dashboard', $data);
    }
}
