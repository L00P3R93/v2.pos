<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class LocalImages
{
    public const SIZE_200x200 = '200x200';
    public const SIZE_1280x720 = '1280x720';

    public static function getRandomFile(?string $size = self::SIZE_200x200): SplFileInfo
    {
        $dir = database_path("seeders/local_images/{$size}");

        if (! File::isDirectory($dir)) {
            throw new \RuntimeException("LocalImages: directory not found: {$dir}");
        }

        $files = File::files($dir); // array<Symfony\Component\Finder\SplFileInfo>

        if (empty($files)) {
            throw new \RuntimeException("LocalImages: no files in {$dir}");
        }


        $file = Arr::random($files); // returns a single SplFileInfo

        return $file;
    }

    public static function getRandomPath(?string $size = self::SIZE_200x200): string
    {
        return self::getRandomFile($size)->getRealPath();
    }
}
