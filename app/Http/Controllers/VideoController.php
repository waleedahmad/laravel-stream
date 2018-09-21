<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForStreaming;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('videos')->with('videos', $videos);
    }

    public function uploader(){
        return view('uploader');
    }

    public function store(StoreVideoRequest $request)
    {
        $path = str_random(16) . '.' . $request->video->getClientOriginalExtension();
        $request->video->storeAs('public', $path);

        $video = Video::create([
            'disk'          => 'public',
            'original_name' => $request->video->getClientOriginalName(),
            'path'          => $path,
            'title'         => $request->title,
        ]);

        ConvertVideoForStreaming::dispatch($video);

        return redirect('/uploader')
            ->with(
                'message',
                'Your video will be available shortly after we process it'
            );
    }
}
