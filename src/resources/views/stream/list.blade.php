@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($streams as $streamData)
        <div class="col-md-4">
            <a href="{{route('stream-show', $streamData->id)}}">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <img src="{{Storage::disk('public')->url("previews/$streamData->preview")}}" alt="">
                    </div>
                    <div class="card-footer border-0">{{$streamData->title}}</div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
