<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.albums.index', compact('albums'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with(['images' => function ($query) {
            $query->orderBy('created_at', 'DESC');
        }])->findOrFail($id);

        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $album->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.albums.index');
    }

    private function deleteCoverImage(String $cover_image)
    {
        $coverPath = public_path("images/albums/$cover_image");
        $this->deleteFile($coverPath);
    }

}
