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

if (!function_exists('accountIsRoot')) {
  function accountIsRoot()
  {
    return activeGuard() === ROOT;
  }
}

if (!function_exists('accountIsOperator')) {
  function accountIsOperator()
  {
    return activeGuard() === OPERATOR;
  }
}

if (!function_exists('accountIsAdmin')) {

  function accountIsAdmin()
  {
    return activeGuard() === ADMIN;
  }
}
