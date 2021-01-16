<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TesController extends Controller
{
    public function index()
    {
        $files = Storage::allDirectories('rpp');
        return view('tes', ['files' => $files]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $file->storePubliclyAs('public/rpp', $file->getClientOriginalName());
        $path = Storage::disk('public')->allFiles('rpp');
        return back()->with(['path' => $path, 'dir' => []]);
    }
}
