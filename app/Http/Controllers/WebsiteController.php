<?php

namespace App\Http\Controllers;

use App\Models\DescriptionProfile;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\JalurMasukPPDB;
use App\Models\News;
use App\Models\Pages;
use App\Models\ProfileAnggota;
use App\Models\SettingBerandaWeb;
use App\Models\SettingPPDB;
use App\Models\Slider;
use App\Models\SyaratPPDB;
use App\Models\Tabloid;
use App\Models\Testimoni;
use App\Models\Video;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    protected $view = "website";
    public function index()
    {
        $sliders = Slider::all();
        $setting = SettingBerandaWeb::get()->keyBy('param');
        $alumnis = Testimoni::all();
        $news = News::with(['bidang'])->statusPublished()->orderBy("created_at", "DESC")->limit(5)->get();
        $data = [
            "title" => "Beranda",
            "sliders" => $sliders,
            "setting" => $setting,
            "alumnis" => $alumnis,
            "news" => $news
        ];

        return view("{$this->view}.beranda", $data);
    }

    public function news(Request $request)
    {
        $search = $request->input('search');
        $news = News::with("bidang")
            ->when(!empty($search), function ($query) use ($search) {
                $escapedSearch = '%' . addcslashes($search, '%_') . '%';
                $query->where(function ($q) use ($escapedSearch) {
                    $q->where('title', 'LIKE', $escapedSearch)
                        ->orWhere('content', 'LIKE', $escapedSearch)
                        ->orWhere('meta_description', 'LIKE', $escapedSearch);
                });
            })
            ->statusPublished()
            ->paginate(9)
            ->appends(['search' => $search]);
        $data = [
            "title" => "Berita",
            "news" => $news,
            "search" => $search
        ];
        return view("{$this->view}.news", $data);
    }

    public function newsDetail($slug)
    {
        $news = News::with(['bidang'])->where("slug", $slug)->first();
        $data = [
            "news" => $news,
            "meta" => [
                "meta_title" => $news->title,
                "meta_description" => $news->meta_description
            ]
        ];

        return view("{$this->view}.news-detail", $data);
    }

    public function madrasah()
    {
        $anggota = ProfileAnggota::where("jenis_profile", JENIS_PROFILE_MADRASAH)->orderBy("urutan", "ASC")->get();
        $description = DescriptionProfile::where("param", "LIKE", '%' . JENIS_PROFILE_MADRASAH)->get()->keyBy("param");
        $data = [
            "title" => "Profile Madrasah",
            "anggota" => $anggota,
            "description" => $description
        ];

        return view("{$this->view}.madrasah", $data);
    }

    public function komite()
    {
        $anggota = ProfileAnggota::where("jenis_profile", JENIS_PROFILE_KOMITE)->orderBy("urutan", "ASC")->get();
        $description = DescriptionProfile::where("param", "LIKE", '%' . JENIS_PROFILE_KOMITE)->get()->keyBy("param");
        $data = [
            "title" => "Profile Komite",
            "anggota" => $anggota,
            "description" => $description
        ];

        return view("{$this->view}.komite", $data);
    }

    public function struktural()
    {
        $anggota = ProfileAnggota::where("jenis_profile", JENIS_PROFILE_STRUKTURAL)->orderBy("urutan", "ASC")->get();
        $description = DescriptionProfile::where("param", "LIKE", '%' . JENIS_PROFILE_STRUKTURAL)->get()->keyBy("param");
        $data = [
            "title" => "Profile Struktural",
            "anggota" => $anggota,
            "description" => $description
        ];

        return view("{$this->view}.struktural", $data);
    }

    public function page($slug)
    {
        $page = Pages::where("slug", $slug)->first();
        $data = ["page" => $page];

        return view("{$this->view}.page", $data);
    }

    public function gallery()
    {
        $gallery = Gallery::all();
        $data = [
            "title" => "Galeri",
            "gallery" => $gallery
        ];
        return view("{$this->view}.gallery", $data);
    }

    public function video()
    {
        $video = Video::all();
        $data = [
            "title" => "Video",
            "video" => $video
        ];

        return view("{$this->view}.video", $data);
    }

    public function majalah()
    {
        $majalah = Tabloid::all();

        $data = [
            "title" => "Majalah",
            "majalah" => $majalah
        ];

        return view("{$this->view}.majalah", $data);
    }

    public function informasiPPDB()
    {
        $setting = SettingPPDB::all()->keyBy("param");
        $jalur_pendaftaran = JalurMasukPPDB::all();
        $syarat = SyaratPPDB::all();
        $data = [
            "title" => "Informasi PPDB",
            "setting" => $setting,
            "jalur_pendaftaran" => $jalur_pendaftaran,
            "syarat" => $syarat
        ];
        return view("{$this->view}.informasi-ppdb", $data);
    }

    public function visiMisi()
    {
        $data = [
            "title" => "Visi Misi",
            "setting" => VisiMisi::all()->keyBy("param")
        ];
        return view("{$this->view}.visi-misi", $data);
    }

    public function faq()
    {
        $data = [
            "title" => "FAQ",
            "faq" => Faq::all()
        ];

        return view("{$this->view}.faq", $data);
    }
}
