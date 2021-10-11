<?php

namespace App\Http\Controllers\Website\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Album\SubmitAlbumRequest;
use App\Http\Traits\FileUpload;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class AlbumController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the user's albums.
     *
     */
    public function index()
    {
        $userAlbums = auth()->user()->albums()->get();
        return view('website.user.albums.index', compact('userAlbums'));
    }

    /**
     * Show the form for creating a new album.
     */
    public function create()
    {
        return view('website.user.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubmitAlbumRequest $request)
    {
        $cover_image = $this->upload($request->cover_image, 'albums');
        Album::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $cover_image,
            'is_public' => $request->is_public ?? 0,
            'user_id' => auth()->id()
        ]);
        return redirect(route('albums.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with(['images' => function ($query) {
            $query->orderBy('created_at', 'DESC');
        }])->findOrFail($id);

        return view('website.user.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('website.user.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $cover_image = $album->cover_image;

        if($request->has('cover_image')){
            //delete old image
            $this->deleteCoverImage($album->cover_image);
            //upload new image
            $cover_image = $this->upload($request->cover_image, 'albums');
        }
        $album->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $cover_image,
            'is_public' => $request->is_public ?? 0,
        ]);
        return redirect(route('albums.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $this->deleteCoverImage($album->cover_image);
        //delete album record from database
        $album->delete();

        return back();

    }

    private function deleteCoverImage(String $cover_image)
    {
        $coverPath = public_path("images/albums/$cover_image");
        //delete image file from public
        $this->deleteFile($coverPath);
    }

}
