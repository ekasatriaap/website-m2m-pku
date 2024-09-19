<?php

namespace App\Http;

use Symfony\Component\HttpKernel\HttpKernel;

class Kernel extends HttpKernel
{
  protected $middleware = [
    'checkLevel' => \App\Http\Middleware\CheckUserLevel::class
  ];
}
