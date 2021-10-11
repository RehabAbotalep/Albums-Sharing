<?php

namespace App\Http\Controllers\Website\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Album\SubmitAlbumImageRequest;
use App\Http\Traits\FileUpload;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use FileUpload;

    public function create($id)
    {
        $album = Album::findOrFail($id);
        return view('website.user.albums.addImage', compact('album'));
    }

    /** Add image to an album*/
    public function store(SubmitAlbumImageRequest $request)
    {
        $image = $this->upload($request->image, 'albumImages');
        Image::create([
            'description' => $request->description,
            'image' => $image,
            'album_id' => $request->album_id,
        ]);
        return redirect(route('albums.show', $request->album_id));
    }

    /** Delete an album image*/
    public function delete($id)
    {
        $image = Image::findOrFail($id);
        $imagePath = public_path("images/albumImages/$image->image");

        //delete image file from public
        $this->deleteFile($imagePath);

        //delete image record from database
        $image->delete();

        return back();
    }
}
