<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

use App\Models\DTO\StreamData;
use App\Models\Stream;

class StreamController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function create()
    {
        return view('stream.new');
    }

    public function show(string $id)
    {
        $stream = Stream::find($id);
        $streamData = StreamData::fromModel($stream);
        return view('stream.show', compact('streamData'));
    }

    public function list()
    {
        $streams = Stream::orderBy('status')->paginate(10);
        return view('stream.list', compact('streams'));
    }

    public function createSubmit(Request $request)
    {
        $streamData = StreamData::fromRequest($request);

        $response = Http::post('https://test.antmedia.io:5443/Sandbox/rest/v2/broadcasts/create?autoStart=false',[
            'name' => $streamData->title,
            'description' => $streamData->description,
        ])->json();

        $filename = static::uploadPreview($streamData);

        $stream = Stream::create([
            'title' => $streamData->title,
            'description' => $streamData->description,
            'preview' => $filename,
            'user_id' => $streamData->user_id,
            'api_name' => $response['streamId'],
        ]);

        return redirect()->route('stream-show', $stream->id);
    }

    public static function uploadPreview(StreamData $streamData) : string
    {
        $file = $streamData->preview;
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(Storage::disk('public')->path('previews'), $filename);

        return $filename;
    }

    public function finish($id)
    {
        $stream = Stream::find($id);
        $response = Http::post("https://test.antmedia.io:5443/Sandbox/rest/v2/broadcasts/$stream->api_name/stop",);
        $stream->update([
            'status' => 'Offline',
        ]);
        return back();
    }
}
