<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    public function index()
    {
        return view('album.index');
    }
}
