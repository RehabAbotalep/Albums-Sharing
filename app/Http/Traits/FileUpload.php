<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

trait FileUpload{

    public function upload($image, $folder_name){

        $ext = $image->getClientOriginalExtension();
        $imageName = $folder_name . '_' . time() . '.' . $ext;
        $image->move(public_path('images/'. $folder_name), $imageName);
        return $imageName;
    }

    public function deleteFile($path)
    {
        if (is_file($path)){
            unlink($path);
        }
    }

}
