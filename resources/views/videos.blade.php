@extends('layouts.app')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mr-auto ml-auto mt-5">
        <h3 class="text-center">
            Videos
        </h3>
        
        @foreach($videos as $video)
            <div class="row mt-5">
                <div class="video" >
                    <div class="title">
                        <h4>
                            {{$video->title}}
                        </h4>
                    </div>
                    @if($video->processed)
                        <video src="/storage/{{$video->stream_path}}"
                               class="w-100"
                               controls></video>
                    @else
                        <div class="alert alert-info w-100">
                             Video is currently being processed and will be available shortly
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endSection