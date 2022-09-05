@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="stream-player">
                @if($streamData->status=='Online')
                <iframe width="100%" height="600" src="https://test.antmedia.io:5443/LiveApp/play.html?name={{$streamData->api_name}}" frameborder="0" allowfullscreen></iframe>
                @else
                <img src="{{Storage::disk('public')->url("previews/$streamData->preview")}}" alt="">
                @endif
            </div>
            <div class="stream-details mt-3">
                <p class="mb-1">
                    <small>
                        {{'@'.$streamData->user_nickname}}
                    </small>
                </p>
                <h4>
                    <span class="badge bg-{{$streamData->status=='Online' ?  'success':'danger'}}">{{$streamData->status}}</span>
                    {{$streamData->title}}
                </h4>
                <p>
                    {{$streamData->description}}
                </p>
                @if($streamData->status=='Online')
                <div class="stream-actions mt-5">
                    <form method="post" action="{{route('stream-finish', $streamData->id)}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Завершить стрим</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
