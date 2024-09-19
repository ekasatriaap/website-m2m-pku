<?php

if (!function_exists('responseSuccess')) {
  function responseSuccess(string $message, array $data = [], $toJson = true, $code = 200)
  {
    $data['success'] = true;
    $data['message'] = $message;
    if ($toJson) return response()->json($data, $code);
    return $data;
  }
}

if (!function_exists('responseFail')) {
  function responseFail(string $message, array $data = [], $toJson = true, $code = 200)
  {
    $data['success'] = false;
    $data['message'] = $message;

    if ($toJson) return response()->json($data, $code);
    return $data;
  }
}
