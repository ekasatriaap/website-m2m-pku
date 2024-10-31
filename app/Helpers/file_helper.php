<?php

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

if (!function_exists('getFileUpload')) {
  function getFileUpload($path)
  {
    return asset("storage/uploads/{$path}");
  }
}

if (!function_exists("uploadFile")) {
  function uploadFile($file, $path, $thumbnail = false)
  {
    $filename = $file->getClientOriginalName();
    $filename = time() . '_' . $filename;
    $file->storeAs("public/uploads/{$path}", $filename);
    if ($thumbnail) {
      storeThumbnail($file, $path, $filename);
    }
    $data['file'] = "{$path}/{$filename}";
    if ($thumbnail) {
      $data['thumbnail'] = "{$path}/thumbnails/{$filename}";
    }
    return $data;
  }
}

if (!function_exists("storeThumbnail")) {
  function storeThumbnail($file, $path, $filename)
  {
    $manager = new ImageManager(new Driver());
    $thumbnail = $manager->read($file->getRealPath())->scale(300, 300);
    $thumbnailFolder = storage_path("app/public/uploads/{$path}/thumbnails");
    if (!file_exists($thumbnailFolder)) {
      mkdir($thumbnailFolder, 0777, true);
    }
    $thumbnail->save("{$thumbnailFolder}/{$filename}");
  }
}

if (!function_exists("deleteFile")) {
  function deleteFile($file)
  {
    if (file_exists(storage_path("app/public/uploads/{$file}"))) {
      unlink(storage_path("app/public/uploads/{$file}"));
    }
  }
}
