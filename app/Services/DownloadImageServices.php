<?php


namespace App\Services;


use Illuminate\Http\UploadedFile;
use Storage;

class DownloadImageServices
{
    public function handle(UploadedFile $image)
    {
        $path = Storage::disk('local')->put('public', $image);

        return $path ?? null;
    }
}
