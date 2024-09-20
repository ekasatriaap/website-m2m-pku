<?php

if (!function_exists('getMenu')) {
  function getMenu()
  {
    $menu = [];
    if (activeGuard() === ADMIN) {
      $menu = [
        [
          "name" => "Dashboard",
          "url" => "dashboard",
          "icon" => "fas fa-tachometer-alt",
        ],
        [
          "name" => "News",
          "url" => "news.index",
          "icon" => "fas fa-newspaper",
        ]
      ];
    } else {
      $menu = [
        [
          "name" => "Dashboard",
          "url" => "dashboard",
          "icon" => "fas fa-tachometer-alt",
        ],
        [
          "name" => "Master",
          "icon" => "fas fa-database",
          "child" => [
            [
              "name" => "Bidang",
              "url" => "bidang.index",
            ],
            [
              "name" => "Users",
              "url" => "users.index"
            ]
          ]
        ]
      ];
    }
    return $menu;
  }
}
