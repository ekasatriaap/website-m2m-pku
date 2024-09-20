<?php
if (!function_exists('activeGuard')) {
  function activeGuard()
  {
    if (auth()->guard('root')->check()) {
      return 'root';
    }
    if (auth()->guard('operator')->check()) {
      return 'operator';
    }
    if (auth()->guard('admin')->check()) {
      return 'admin';
    }

    return null;
  }
}

if (!function_exists('accountLogin')) {
  function accountLogin()
  {
    return auth(activeGuard())->user();
  }
}
