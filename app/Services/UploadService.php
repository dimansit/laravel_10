<?php


namespace App\Services;


use App\Services\Contracts\Upload;
use Illuminate\Http\UploadedFile;

class UploadService implements Upload
{

    /**
     * @throws \Exception
     */
    public function create(UploadedFile $uploadedFile): string
    {

        $path = $uploadedFile->storeAs('news_images', $uploadedFile->hashName(), 'public');
        if (!$path) {
            throw new \Exception('File not not u[loaded');
        }
        return $path;
    }

}
