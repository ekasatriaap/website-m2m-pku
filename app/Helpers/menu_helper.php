<?php

if (!function_exists('getMenu')) {
  function getMenu()
  {
    $menu = [];
    if (activeGuard() === ADMIN) {
      $menu = [
        [
          "name" => "Dashboard",
          "url" => "cms.dashboard",
          "icon" => "fas fa-tachometer-alt",
        ],
        [
          "name" => "Berita",
          "url" => "cms.news.index",
          "icon" => "fas fa-newspaper",
        ]
      ];
    } else {
      $menu = [
        [
          "name" => "Dashboard",
          "url" => "cms.dashboard",
          "icon" => "fas fa-tachometer-alt",
        ],
        [
          "name" => "Master",
          "icon" => "fas fa-database",
          "child" => [
            [
              "name" => "Bidang",
              "url" => "cms.bidang.index",
            ],
            [
              "name" => "Users",
              "url" => "cms.users.index"
            ]
          ]
        ],
        [
          "name" => "Berita",
          "url" => "cms.news.index",
          "icon" => "fas fa-newspaper",
        ],
        [
          "name" => "Pages",
          "url" => "cms.pages.index",
          "icon" => "fas fa-file-alt",
        ],
        [
          "name" => "Tabloid",
          "url" => "cms.tabloid.index",
          "icon" => "fas fa-newspaper",
        ],
        [
          "name" => "Media",
          "icon" => "fas fa-images",
          "child" => [
            [
              "name" => "Galeri",
              "url" => "cms.gallery.index",
            ],
            [
              "name" => "Video",
              "url" => "cms.video.index",
            ]
          ]
        ],
        [
          "name" => "Testimoni",
          "url" => "cms.testimoni.index",
          "icon" => "fas fa-star",
        ],
        [
          "name" => "Profile Web",
          "icon" => "fas fa-university",
          "child" => [
            [
              "name" => "Profile Anggota",
              "url" => "cms.profile_anggota.index",
            ],
            // [
            //   "name" => "Profile Deskripsi",
            //   "url" => "cms.profile_deskripsi.index",
            // ]
          ]
        ],
        [
          "name" => "Setting",
          "icon" => "fas fa-cog",
          "child" => [
            [
              "name" => "Sliders",
              "url" => "cms.slider.index",
            ],
            [
              "name" => "Web Setting",
              "url" => "cms.web_setting.edit",
            ],
            [
              "name" => "Beranda Web",
              "url" => "cms.setting_beranda_web.edit",
            ],
            [
              "name" => "Menu",
              "url" => "cms.menu.index",
            ]
          ]
        ]
      ];
    }
    return $menu;
  }
}
