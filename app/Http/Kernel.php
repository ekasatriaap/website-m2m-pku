<?php

namespace App\Http;

use Symfony\Component\HttpKernel\HttpKernel;

class Kernel extends HttpKernel
{
  protected $middleware = [
    'check.level' => \App\Http\Middleware\CheckUserLevel::class
  ];
}
