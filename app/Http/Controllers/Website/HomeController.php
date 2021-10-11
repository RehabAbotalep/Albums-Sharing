<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $albums = Album::public()->with('user')->get();
        return view('website.home', compact('albums'));
    }
}
