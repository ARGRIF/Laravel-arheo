<?php


namespace App\Services;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageService
{
    protected $defaultName = 'default.jpg';

    protected $path = '/uploads/avatars/';

    public function save(UploadedFile $image)
    {
        if (!empty($image)) {
            $filename = time() . '.jpg';
            $image_size = getimagesize($image);
            Image::make($image)->crop($image_size[0], $image_size[0])->resize(500, 500)->save(public_path($this->path . $filename));
        } else {
            $filename = $this->defaultName;
        }

        return $filename;
    }
}
