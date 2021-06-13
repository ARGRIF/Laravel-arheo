<?php


namespace App\Services;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Scalar\String_;

class ImageService
{
    protected $defaultName = 'default.jpg';

    protected $path = '/uploads/';

    public function save(UploadedFile $image, $savePath, $resize)
    {
        if (!empty($image)) {
            $filename = time() . mt_rand(1, 100) . '.jpg';
            $image_size = getimagesize($image);
            if($resize){
                Image::make($image)->crop($image_size[0], $image_size[0])->resize(500, 500)->save(public_path($this->path.$savePath.'/' . $filename));
            } else {
                Image::make($image)->save(public_path($this->path.$savePath.'/' . $filename));
            }

        } else {
            $filename = $this->defaultName;
        }

        return $filename;
    }
}
