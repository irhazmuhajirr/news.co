<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Helper\Helpers;

class PhotoController extends Controller
{
    public function index()
    {
        Helpers::read_json();
        
        $photos = Photo::orderBy('id', 'desc')->paginate(8);
        return view('frontend.photo-gallery', compact('photos'));
    }
}
