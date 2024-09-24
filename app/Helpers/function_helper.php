<?php

use App\Models\News;

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

if (!function_exists('encode')) {
  function encode($plain, $serialize = true)
  {
    return encrypt($plain, $serialize);
  }
}

if (!function_exists('decode')) {
  function decode($cipher, $unserialize = true)
  {
    if ($cipher == '') return false;
    try {
      return decrypt($cipher, $unserialize);
    } catch (\Exception $e) {
      return false;
    }
  }
}

if (!function_exists('notAjaxAbort')) {
  function notAjaxAbort($code = 404)
  {
    if (!request()->ajax()) abort($code);
    return;
  }
}

if (!function_exists('generateStatus')) {
  function generateStatus($status)
  {
    if ($status == News::STATUS_PUBLISHED) return "<span class='badge badge-success'>Published</span>";
    if ($status == News::STATUS_DRAFT) return "<span class='badge badge-secondary'>Draft</span>";
    if ($status == News::STATUS_REJECT) return "<span class='badge badge-danger'>Rejected</span>";
    if ($status == News::STATUS_SUBMISSION) return "<span class='badge badge-warning'>Submitted</span>";
  }
}
