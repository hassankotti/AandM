<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;


class ImageHelper
{
    static function ImageUpload(Request $request,$file_name,$uplaodPath)
    {

        $path = "";

        if ($request->hasFile($file_name)) {
            $image       = $request->file($file_name);
            $filename    = 'IMG-'.time().'.'.$request->file($file_name)->getClientOriginalExtension();
            $image->move(public_path().$uplaodPath,$filename);
            $image_resize = Image::make(public_path().$uplaodPath.$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($uplaodPath .$filename));
            $path =$uplaodPath.$filename;
        }

        return $path;
    }
}